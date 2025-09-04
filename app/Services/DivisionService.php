<?php

namespace App\Services;

use App\Interfaces\DivisionRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class DivisionService
{
 public function __construct(private readonly DivisionRepositoryInterface $repo)
 {
 }

 public function create(array $data)
 {
  return $this->repo->create($data);
 }

 public function update(int|string $id, array $data)
 {
  return $this->repo->update($id, $data);
 }

 public function delete(int|string $id)
 {
  return $this->repo->delete($id);
 }

 public function list(int $perPage = 15): LengthAwarePaginator|Collection
 {
  return $perPage > 0
   ? $this->repo->paginateWithRelations($perPage)
   : $this->repo->allWithRelations();
 }

 public function getWithRelations(int|string $id)
 {
  return $this->repo->findWithRelations($id);
 }
}
