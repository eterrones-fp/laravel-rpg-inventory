<?php

namespace App\Http\Controllers\Api;

use App\Models\Item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return response()->json(Item::all());
    }

    public function show(Item $item)
    {
        return response()->json($item);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Item::class);

        $validated = $request->validate([
            'name' => 'required|string',
            'type' => 'required|in:weapon,armor,consumable',
            'slot' => 'nullable|in:head,body,weapon',
            'power' => 'required|integer|min:1|max:100',
        ]);

        $item = Item::create($validated);

        return response()->json($item, 201);
    }

    public function update(Request $request, Item $item)
    {
        $this->authorize('update', $item);

        $item->update($request->all());

        return response()->json($item);
    }

    public function destroy(Item $item)
    {
        $this->authorize('delete', $item);

        $item->delete();

        return response()->json([
            'message' => 'Item eliminado'
        ]);
    }
}
