<?php

namespace App\Http\Controllers\Web;

use App\Models\Character;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;
use App\Services\ActionLogService;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->role === 'admin') {
            $characters = Character::with('user')->get();
        } else {
            $characters = Character::with('user')
            ->where('user_id', $user->id)
            ->get();
        }
        return view('characters.index', compact('characters'));
    }

    public function show(Character $character)
    {
        $this->authorize('view', $character);

        $character->load('user', 'inventories.item');

        return view('characters.show', compact('character'));
    }

    public function create()
    {
        return view('characters.create');
    }

    public function store(StoreCharacterRequest $request)
    {
        $this->authorize('create', Character::class);

        $character = Character::create([
            'name' => $request->name,
            'level' => $request->level,
            'user_id' => $request->user()->id,
        ]);

        ActionLogService::log(
            'character_created_web',
            $request->user()->id,
            $character->id,
            null,
            [
                'name' => $character->name,
                'level' => $character->level,
            ]
        );

        return redirect()
            ->route('characters.show.web', $character)
            ->with('success', 'Personaje creado correctamente.');
    }

    public function edit(Character $character)
    {
        $this->authorize('update', $character);

        return view('characters.edit', compact('character'));
    }

    public function update(UpdateCharacterRequest $request, Character $character)
    {
        $this->authorize('update', $character);

        $character->update($request->validated());

        ActionLogService::log(
            'character_updated_web',
            $request->user()->id,
            $character->id,
            null,
            $request->validated()
        );

        return redirect()
            ->route('characters.show.web', $character)
            ->with('success', 'Personaje actualizado correctamente.');
    }

    public function destroy(Character $character)
    {
        $this->authorize('delete', $character);

        $character->delete();

        $name = $character->name;
        $id = $character->id;

        $character->delete();

        ActionLogService::log(
            'character_deleted_web',
            auth()->id(),
            $id,
            null,
            [
                'name' => $name,
            ]
        );

        return redirect()
            ->route('characters.index.web')
            ->with('success', 'Personaje eliminado correctamente.');
    }
}
