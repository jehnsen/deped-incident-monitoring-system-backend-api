<?php

namespace App\Services;

use App\Models\Incident;
use App\Models\IncidentStatusHistory;
use App\Models\IncidentTimeline;
use Illuminate\Database\Eloquent\Collection;
use App\Interfaces\IncidentRepositoryInterface;
use Illuminate\Http\Request;

class IncidentService
{
   public function __construct(
      private readonly IncidentRepositoryInterface $repo, 
      private readonly ActivityLogService $activity
   ){}

   public function all(): Collection
   {
      return $this->repo->getAll();
      // return $this->repo->getAllWithRelations();
   }

   public function paginate(int $perPage)
   {
      return $this->repo->paginate($perPage);
   }

   public function get(int|string $id): Incident
   {
      return $this->repo->findById($id);
   }

   public function create(array $data): Incident
   {
      return $this->repo->create($data);
   }

   public function update(int|string $id, array $data): Incident
   {
      return $this->repo->update($id, $data);
   }

   public function delete(int|string $id): bool
   {
      return $this->repo->delete($id);
   }

   public function getDetails(int $id): Incident
   {
      $incident = $this->repo->findWithDetails($id);
      abort_if(!$incident, 404, 'Incident not found');
      return $incident;
   }

   public function review(int $id, array $payload, ?Request $request = null): Incident
   {
      $incident = $this->repo->findById($id);

      // who is acting
      $actorId = $payload['reviewed_by_user_id']
         ?? (auth()->check() ? auth()->id() : null);

      // capture "before" values
      $fromStatus = $incident->status;
      $fromDecision = $incident->review_decision;

      // compose update fields
      $update = [
         'review_decision' => $payload['review_decision'],
         'review_comments' => $payload['review_comments'] ?? null,
         'reviewed_by_user_id' => $actorId,
         'reviewed_at' => $payload['reviewed_at'] ?? now(),
      ];

      // optional status transition from UI
      if (!empty($payload['status'])) {
         $update['status'] = $payload['status'];
      }

      // persist
      $incident = $this->repo->update($incident, $update)->load(['reporter', 'reviewer', 'school', 'issuances']);

      // create status history if status changed
      if (($update['status'] ?? $fromStatus) !== $fromStatus) {
         IncidentStatusHistory::create([
            'incident_id' => $incident->id,
            'from_status' => $fromStatus,
            'to_status' => $update['status'],
            'notes' => $update['review_comments'] ?? null,
            'changed_by_user_id' => $actorId,
            'changed_at' => now(),
         ]);
      }

      // add timeline entry
      $timelineEvent = sprintf(
         'Review decision: %s%s',
         $update['review_decision'],
         isset($update['status']) ? " (status → {$update['status']})" : ''
      );

      IncidentTimeline::create([
         'incident_id' => $incident->id,
         'event' => $timelineEvent,
         'performed_by_user_id' => $actorId,
         'timestamp' => now(),
      ]);

      // activity log (polymorphic)
      $action = match ($update['status'] ?? '') {
         'Approved' => 'approved',
         'Rejected' => 'rejected',
         'Resolved' => 'resolved',
         default => 'reviewed',
      };

      $this->activity->create([
         'action' => $action,
         'description' => $timelineEvent,
         'subject_type' => Incident::class,
         'subject_id' => $incident->id,
         'actor_user_id' => $actorId,
         'meta' => [
            'from_status' => $fromStatus,
            'to_status' => $update['status'] ?? $fromStatus,
            'from_decision' => $fromDecision,
            'to_decision' => $update['review_decision'],
            'review_comments' => $update['review_comments'] ?? null,
         ],
      ], $request);

      // return fresh with child data commonly needed by your UI
      return $this->repo->findWithDetails($incident->id);
   }
}
