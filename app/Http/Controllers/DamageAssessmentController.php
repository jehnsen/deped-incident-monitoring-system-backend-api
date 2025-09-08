<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\DamageAssessment\StoreDamageAssessmentRequest;
use App\Http\Requests\DamageAssessment\UpdateDamageAssessmentRequest;
use App\Http\Resources\DamageAssessmentResource;
use App\Interfaces\DamageAssessmentRepositoryInterface;
use App\Services\DamageAssessmentService;
use Illuminate\Http\Request;

class DamageAssessmentController extends Controller
{
   private DamageAssessmentRepositoryInterface $_damageAssessmentRepositoryInterface;
   public function __construct(DamageAssessmentRepositoryInterface $damageAssessmentRepositoryInterface)
   {
      $this->_damageAssessmentRepositoryInterface = $damageAssessmentRepositoryInterface;
   }

   public function index(Request $request)
   {
      $perPage = (int) $request->query('per_page', 0);
      if ($perPage > 0) {
         return DamageAssessmentResource::collection($this->_damageAssessmentRepositoryInterface->paginate($perPage));
      }
      return DamageAssessmentResource::collection($this->_damageAssessmentRepositoryInterface->all());
   }

   public function show(int $id)
   {
      return new DamageAssessmentResource($this->_damageAssessmentRepositoryInterface->find($id));
   }

   public function store(StoreDamageAssessmentRequest $request)
   {
      $model = $this->_damageAssessmentRepositoryInterface->create($request->validated());
      return (new DamageAssessmentResource($model))->response()->setStatusCode(201);
   }

   public function update(UpdateDamageAssessmentRequest $request, int $id)
   {
      $model = $this->_damageAssessmentRepositoryInterface->update($id, $request->validated());
      return new DamageAssessmentResource($model);
   }

   public function destroy(int $id)
   {
      $model = $this->_damageAssessmentRepositoryInterface->find($id);
      $this->_damageAssessmentRepositoryInterface->delete($model);
      return response()->json(['message' => 'Deleted successfully']);
   }
}
