<?php

namespace App\Repositories;

use App\Models\Division;
use App\Interfaces\DivisionRepositoryInterface;

class DivisionRepository implements DivisionRepositoryInterface
{
   protected $model;
   public function __construct(Division $model)
   {
      $this->model = $model;
   }

   public function withRelations(): array
   {
      return ['region'];
   }

   public function create(array $data)
   {
      return $this->model->create($data);
   }

   public function update(int|string $id, array $data)
   {
      return $this->model->where('id', $id)->update($data);
   }

   public function delete(int|string $id)
   {
      return $this->model->where('id', $id)->delete();
   }

   public function allWithRelations()
   {
      return $this->model->with($this->withRelations())->orderBy('name')->get();
   }

   public function paginateWithRelations(int $perPage = 15)
   {
      return $this->model->with($this->withRelations())->orderBy('name')->paginate($perPage);
   }

   public function findWithRelations(int|string $id)
   {
      return $this->model->with($this->withRelations())->find($id);
   }
}
