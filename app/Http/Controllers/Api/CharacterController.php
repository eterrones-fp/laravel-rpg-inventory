<?php

namespace App\Http\Controllers\Api;

use App\Models\Character;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\ActionLogService;

class CharacterController extends Controller
{
    public function index(): JsonResponse
    {
        $characters = Character::with('user')->get();

        return response()->json($characters);
    }

    public function show(Character $character): JsonResponse
    {
        return response()->json($character->load('user', 'inventories.item'));
    }

    public function store(StoreCharacterRequest $request): JsonResponse
    {
        $this->authorize('create', Character::class);

        $character = Character::create([
            'name' => $request->name,
            'level' => $request->level,
            'user_id' => $request->user()->id,
        ]);

        ActionLogService::log(
            'character_created',
            $request->user()->id,
            $character->id,
            null,
            [
                'name' => $character->name,
                'level' => $character->level,
            ]
        );
        return response()->json([
            'message' => 'Personaje creado correctamente.',
            'character' => $character,
        ], 201);
    }

    public function update(UpdateCharacterRequest $request, Character $character): JsonResponse
    {
        $this->authorize('update', $character);

        $character->update($request->validated());

        ActionLogService::log(
            'character_updated',
            $request->user()->id,
            $character->id,
            null,
            $request->validated()
        );

        return response()->json([
            'message' => 'Personaje actualizado correctamente.',
            'character' => $character,
        ]);
    }

    public function destroy(Character $character): JsonResponse
    {
        $this->authorize('delete', $character);

        $character->delete();

        ActionLogService::log(
            'character_deleted',
            auth()->id(),
            $character->id,
            null,
            [
                'name' => $character->name,
            ]
        );

         return response()->json([
            'message' => 'Personaje eliminado correctamente.'
        ]);
    }
}
