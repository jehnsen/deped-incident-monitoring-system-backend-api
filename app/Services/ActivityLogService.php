<?php

namespace App\Services;

use App\Models\ActivityLog;
use App\Interfaces\ActivityLogRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ActivityLogService
{
    public function __construct(private readonly ActivityLogRepositoryInterface $repo) {}

    public function all(): Collection
    {
        return $this->repo->all();
    }

    public function paginate(int $perPage = 15, array $filters = []): LengthAwarePaginator
    {
        return $this->repo->paginate($perPage, $filters);
    }

    public function findOrFail(int $id): ActivityLog
    {
        $log = $this->repo->find($id);
        abort_if(!$log, 404, 'Activity log not found');
        return $log;
    }

    public function create(array $data, ?Request $request = null): ActivityLog
    {
        // Sensible defaults
        if (!isset($data['actor_user_id']) && auth()->check()) {
            $data['actor_user_id'] = auth()->id();
        }
        if ($request) {
            $data['ip_address']  = $data['ip_address']  ?? $request->ip();
            $data['user_agent']  = $data['user_agent']  ?? (string) $request->userAgent();
        }
        return $this->repo->create($data);
    }

    public function update(int $id, array $data): ActivityLog
    {
        $log = $this->findOrFail($id);
        return $this->repo->update($log, $data);
    }

    public function delete(int $id): void
    {
        $log = $this->findOrFail($id);
        $this->repo->delete($log);
    }
    
}
