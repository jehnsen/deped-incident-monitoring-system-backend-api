<?php

namespace App\Interfaces;

interface DivisionRepositoryInterface
{
   public function withRelations(): array;
   public function paginateWithRelations(int $perPage = 15);
   public function allWithRelations();
   public function findWithRelations(int|string $id);
   public function create(array $data);
   public function update(int|string $id, array $data);
   public function delete(int|string $id);
}