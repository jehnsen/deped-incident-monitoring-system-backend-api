<?php

namespace App\Repositories;

use App\Models\IncidentType;
use App\Interfaces\IncidentTypeRepositoryInterface;

class IncidentTypeRepository implements IncidentTypeRepositoryInterface
{
   public function __construct(IncidentType $model)
   {
   }

   public function allWithRelations()
   {
      // Implement logic to return all IncidentTypes with relations
      return IncidentType::with($this->withRelations())->get();
   }

   public function create(array $data)
   {
      // Implement logic to create a new IncidentType
      return IncidentType::create($data);
   }

   public function delete(int|string $id)
   {
      // Implement logic to delete an IncidentType by id
      return IncidentType::destroy($id);
   }

   public function findWithRelations(int|string $id)
   {
      // Implement logic to find an IncidentType by id with relations
      return IncidentType::with($this->withRelations())->find($id);
   }

   public function paginateWithRelations(int $perPage = 15)
   {
      // Implement logic to paginate IncidentTypes with relations
      return IncidentType::with($this->withRelations())->paginate($perPage);
   }

   public function update(int|string $id, array $data)
   {
      // Implement logic to update an IncidentType by id
      $incidentType = IncidentType::find($id);
      if ($incidentType) {
         $incidentType->update($data);
      }
      return $incidentType;
   }

   public function withRelations(): array
   {
      // Return an array of relations to eager load
      return [];
   }
}
