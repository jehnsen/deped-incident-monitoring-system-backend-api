<?php

namespace App\Services;

use App\Models\Tag;
use App\Interfaces\TagRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class TagService
{
   public function __construct(private readonly TagRepositoryInterface $repo)
   {
   }

   public function all(): Collection
   {
      return $this->repo->all();
   }
   public function paginate(int $perPage = 15): LengthAwarePaginator
   {
      return $this->repo->paginate($perPage);
   }
   public function find(int $id): ?Tag
   {
      return $this->repo->find($id);
   }
   public function store(array $data): Tag
   {
      return $this->repo->create($data);
   }
   public function update(int $id, array $data): Tag
   {
      $tag = $this->find($id);
      return $this->repo->update($tag, $data);
   }
   public function delete(int $id): void
   {
      $tag = $this->find($id);
      $this->repo->delete($tag);
   }
}
