<?php

namespace App\Interfaces;

interface ResidentRepositoryInterface
{
    public function index();
    public function getResidentsWithFilters($request);
    public function getById($id);
    public function store(array $data);
    public function update(array $data,$id);
    public function delete($id);
    public function updateHouseholdId(int $residentId, int $householdId);
    public function findById($id);
}
