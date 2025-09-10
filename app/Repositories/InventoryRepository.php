<?php


namespace App\Repositories;

use App\Models\Inventory;
use App\Interfaces\InventoryRepositoryInterface;

use App\Models\InventoryAttachment;
use Illuminate\Support\Facades\DB;

class InventoryRepository implements InventoryRepositoryInterface
{
   public function all(): \Illuminate\Support\Collection
   {
      return Inventory::all();
   }

   public function find(int $id): ?Inventory
   {
      return Inventory::find($id);
   }

   public function paginate(int $perPage = 15): \Illuminate\Contracts\Pagination\LengthAwarePaginator
   {
      return Inventory::paginate($perPage);
   }

   public function delete(Inventory $inventory): void
   {
      $inventory->delete();
   }

   public function create(array $data): Inventory
   {
      return DB::transaction(function () use ($data) {
         $attachments = $data['attachments'] ?? [];
         unset($data['attachments']);

         $inv = Inventory::create($data);

         foreach ($attachments as $att) {
            InventoryAttachment::create(array_merge($att, ['inventory_id' => $inv->id]));
         }
         return $inv->load('attachments');
      });
   }

   public function update(Inventory $inventory, array $data): Inventory
   {
      return DB::transaction(function () use ($inventory, $data) {
         $attachments = $data['attachments'] ?? null;
         unset($data['attachments']);

         $inventory->update($data);

         if (is_array($attachments)) {
            foreach ($attachments as $att) {
               InventoryAttachment::create(array_merge($att, ['inventory_id' => $inventory->id]));
            }
         }
         return $inventory->load('attachments');
      });
   }
}