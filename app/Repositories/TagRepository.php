<?php

namespace App\Repositories;

use App\Models\Tag;
use App\Interfaces\TagRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class TagRepository implements TagRepositoryInterface
{
   public function all(): Collection
   {
      return Tag::orderBy('name')->get();
   }

   public function paginate(int $perPage = 15): LengthAwarePaginator
   {
      return Tag::orderBy('name')->paginate($perPage);
   }

   public function find(int $id): ?Tag
   {
      return Tag::find($id);
   }

   public function create(array $data): Tag
   {
      return Tag::create($data);
   }

   public function update(Tag $tag, array $data): Tag
   {
      $tag->update($data);
      return $tag;
   }

   public function delete(Tag $tag): void
   {
      $tag->delete();
   }
}
