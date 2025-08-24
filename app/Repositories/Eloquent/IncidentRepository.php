<?php

namespace App\Repositories\Eloquent;

use App\Models\Incident;
use App\Repositories\Contracts\IncidentRepositoryInterface;

class IncidentRepository extends BaseRepository implements IncidentRepositoryInterface
{
    public function __construct(Incident $model)
    {
        parent::__construct($model);
    }

    public function withAllRelations(): array
    {
        return [
            'type','school','reporter',
            'attachments','statuses','affected','damages','assistance','occupancies'
        ];
    }
}