<?php

namespace App\Repositories\Contracts;

interface IncidentRepositoryInterface extends BaseRepositoryInterface
{
    public function withAllRelations(): array;
}