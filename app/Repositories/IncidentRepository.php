<?php

namespace App\Repositories;

use App\Models\Incident;
use Illuminate\Database\Eloquent\Collection;
use App\Interfaces\IncidentRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class IncidentRepository implements IncidentRepositoryInterface
{
    public function __construct(private readonly Incident $model) {}

    public function getAll(): Collection
    {
        // return $this->model->orderByDesc('created_at')->get();
        return $this->model::with(['reporter','school'])
            ->latest('id')->get();
    }

    public function withAllRelations(): array
    {
        return ['type', 'school', 'reporter', 'attachments', 'statuses', 'affected', 'damages', 'assistance', 'occupancies'];
    }

    public function getAllWithRelations(): Collection
    {
        return $this->model
            ->with($this->withAllRelations())
            ->orderByDesc('created_at')
            ->get();
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return $this->model->orderByDesc('created_at')->paginate($perPage);
    }

    public function findById(int|string $id): Incident
    {
        // return $this->model->findOrFail($id);
        return $this->model->with(['reporter','school','issuances','attachments','timelines'])
            ->find($id);
    }

    public function create(array $data): Incident
    {
        return $this->model->create($data);
    }

    public function update(int|string $id, array $data): Incident
    {
        $record = $this->model->findOrFail($id);
        $record->update($data);
        return $record;
    }

    public function delete(int|string $id): bool
    {
        $record = $this->model->findOrFail($id);
        return (bool) $record->delete();
    }

    public function findWithDetails(int $id): Incident
    {
        return Incident::query()
            ->withCount(['attachments'])
            ->with([
                // light parent refs
                'reporter:id,full_name,name',
                // 'reviewer:id,full_name,name',
                'school:id,name,address,latitude,longitude',
                // 'statusHistories' => fn($q) => $q->orderByDesc('changed_at')
                //     ->select(['id','incident_id','from_status','to_status','notes','changed_by_user_id','changed_at'])
                //     ->with(['incident:id', 'user:id,full_name,name']),
                'attachments:id,incident_id,file_path,file_type,original_name,created_at',
                'issuances' => fn($q) => $q->select(['issuances.id','code','title','category','issued_at'])
                    ->with(['tags:id,name'])->orderBy('issued_at','desc'),
                'timelines' => fn($q) => $q->orderBy('timestamp')
                    ->select(['id','incident_id','event','performed_by_user_id','timestamp'])
                    ->with(['performer:id,full_name,name'])
            ])
            ->select([
                'id','title','type_id','severity',
                'reported_by_user_id','reported_at',
                'school_id','address','latitude','longitude',
                'summary',
                'students_affected','teachers_affected','staff_affected',
                'infrastructure_damage_level','estimated_cost',
                'status','review_decision','review_comments','reviewed_by_user_id','reviewed_at',
                'created_at','updated_at'
            ])
            ->with(['incidentType:id,code,name']) // if you have IncidentType
            ->find($id);
    }

}
