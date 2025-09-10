<?php

namespace App\Interfaces;

use App\Models\Program;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ProgramRepositoryInterface
{
   public function all(): Collection;
   public function paginate(int $perPage = 15): LengthAwarePaginator;
   public function find(int $id): ?Program;
   public function create(array $data): Program;
   public function update(Program $program, array $data): Program;
   public function delete(Program $program): void;
}
