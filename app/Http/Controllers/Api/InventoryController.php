<?php

namespace App\Http\Controllers\Api;

use App\Models\Item;
use App\Models\Character;
use App\Models\Inventory;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateInventoryRequest;
use Illuminate\Http\JsonResponse;

class InventoryController extends Controller
{
    public function index(Character $character): JsonResponse
    {
        if (
            auth()->user()->role !== 'admin' &&
            $character->user_id !== auth()->id()
        ) {
            abort(403, 'No autorizado.');
        }

        $inventory = $character->inventories()->with('item')->get();

        return response()->json($inventory);
    }

    public function upsert(UpdateInventoryRequest $request, Character $character): JsonResponse
    {
        if (
            $request->user()->role !== 'admin' &&
            $character->user_id !== $request->user()->id
        ) {
            abort(403, 'No autorizado.');
        }

        $item = Item::findOrFail($request->item_id);

        if ($request->boolean('equipped') && $item->slot !== null) {
            $character->inventories()
                ->where('equipped', true)
                ->whereHas('item', function ($query) use ($item) {
                    $query->where('slot', $item->slot);
                })
                ->update(['equipped' => false]);
        }

        $inventory = Inventory::updateOrCreate(
            [
                'character_id' => $character->id,
                'item_id' => $request->item_id,
            ],
            [
                'quantity' => $request->quantity,
                'equipped' => $request->equipped,
            ]
        );

        ActionLogService::log(
            'inventory_updated',
            $request->user()->id,
            $character->id,
            $item->id,
            [
                'quantity' => $request->quantity,
                'equipped' => $request->equipped,
                'slot' => $item->slot,
            ]
        );

        return response()->json([
            'message' => 'Inventario actualizado correctamente.',
            'inventory' => $inventory->load('item'),
        ]);
    }
}
