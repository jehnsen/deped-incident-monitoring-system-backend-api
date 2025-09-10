<?php

namespace App\Services;

use App\Models\Program;
use App\Interfaces\ProgramRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ProgramService
{
   public function __construct(private readonly ProgramRepositoryInterface $repo)
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
   public function find(int $id): ?Program
   {
      return $this->repo->find($id);
   }
   public function store(array $data): Program
   {
      return $this->repo->create($data);
   }
   public function update(int $id, array $data): Program
   {
      $m = $this->find($id);
      return $this->repo->update($m, $data);
   }
   public function delete(int $id): void
   {
      $m = $this->find($id);
      $this->repo->delete($m);
   }
}
