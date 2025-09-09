<?php

namespace App\Interfaces;

use App\Models\Issuance;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface IssuanceRepositoryInterface {
    public function all(): Collection;
    public function paginate(int $perPage = 15): LengthAwarePaginator;
    public function find(int $id): ?Issuance;
    public function create(array $data): Issuance;          // also handles tags/hazards/attachments
    public function update(Issuance $issuance, array $data): Issuance;
    public function delete(Issuance $issuance): void;
}