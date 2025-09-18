<?php

namespace App\Repositories;

use App\Models\ActivityLog;
use App\Interfaces\ActivityLogRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ActivityLogRepository implements ActivityLogRepositoryInterface
{
    public function all(): Collection
    {
        return ActivityLog::with('actor')->latest('id')->get();
    }

    public function paginate(int $perPage, array $filters = []): LengthAwarePaginator
    {
        $q = ActivityLog::query()->with('actor');

        if (!empty($filters['subject_type'])) {
            $q->where('subject_type', $filters['subject_type']);
        }
        if (!empty($filters['subject_id'])) {
            $q->where('subject_id', (int) $filters['subject_id']);
        }
        if (!empty($filters['action'])) {
            $q->where('action', $filters['action']);
        }
        if (!empty($filters['actor_user_id'])) {
            $q->where('actor_user_id', (int) $filters['actor_user_id']);
        }
        if (!empty($filters['date_from']) || !empty($filters['date_to'])) {
            $q->when($filters['date_from'] ?? null, fn($qq,$v) => $qq->where('created_at','>=',$v))
              ->when($filters['date_to'] ?? null,   fn($qq,$v) => $qq->where('created_at','<=',$v));
        }
        if (!empty($filters['search'])) {
            $s = $filters['search'];
            $q->where(function ($qq) use ($s) {
                $qq->where('description','like',"%$s%")
                   ->orWhere('action','like',"%$s%");
            });
        }

        return $q->latest('id')->paginate($perPage);
    }

    public function find(int $id): ?ActivityLog
    {
        return ActivityLog::with('actor')->find($id);
    }

    public function create(array $data): ActivityLog
    {
        return ActivityLog::create($data)->load('actor');
    }

    public function update(ActivityLog $log, array $data): ActivityLog
    {
        $log->fill($data)->save();
        return $log->load('actor');
    }

    public function delete(ActivityLog $log): void
    {
        $log->delete();
    }
}
