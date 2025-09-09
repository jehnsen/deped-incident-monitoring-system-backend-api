<?php

namespace App\Services;

use App\Models\Assistance;
use App\Interfaces\AssistanceRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class AssistanceService
{
   public function __construct(private readonly AssistanceRepositoryInterface $repo)
   {
   }

   public function all(): Collection
   {
      return $this->repo->all();
   }

   public function paginate(int $perPage = 15): LengthAwarePaginator
   {
      return $this->repo->paginate($perPage);
   }

   public function findOrFail(int $id): Assistance
   {
      $m = $this->repo->find($id);
      abort_if(!$m, 404, 'Assistance not found.');
      return $m;
   }

   public function store(array $data): Assistance
   {
      $data = $this->normalize($data);
      return $this->repo->create($data);
   }

   public function update(int $id, array $data): Assistance
   {
      $m = $this->findOrFail($id);
      $data = $this->normalize($data, $m);
      return $this->repo->update($m, $data);
   }

   public function destroy(int $id): void
   {
      $m = $this->findOrFail($id);
      $this->repo->delete($m);
   }

   private function normalize(array $data, ?Assistance $existing = null): array
   {
      // date_provided <-> delivered_at
      if (!empty($data['date_provided']) && empty($data['delivered_at'])) {
         $data['delivered_at'] = $data['date_provided'];
      } elseif (empty($data['date_provided']) && !empty($data['delivered_at'])) {
         // ok as-is
      } elseif ($existing && empty($data['date_provided']) && empty($data['delivered_at'])) {
         $data['delivered_at'] = $existing->delivered_at;
      }

      // provider_agency <-> delivered_by (legacy)
      if (!empty($data['provider_agency']) && empty($data['delivered_by'])) {
         $data['delivered_by'] = $data['provider_agency'];
      } elseif (empty($data['provider_agency']) && !empty($data['delivered_by'])) {
         $data['provider_agency'] = $data['delivered_by'];
      } elseif ($existing && empty($data['provider_agency']) && empty($data['delivered_by'])) {
         $data['provider_agency'] = $existing->provider_agency;
         $data['delivered_by'] = $existing->delivered_by;
      }

      // defaults
      if (isset($data['status']) && $data['status'] === null) {
         unset($data['status']); // keep existing if null on update
      }

      return $data;
   }
}
