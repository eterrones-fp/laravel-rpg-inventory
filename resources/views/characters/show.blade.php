@extends('layouts.app')

@section('content')
    <h1>{{ $character->name }}</h1>

    <p><strong>Level:</strong> {{ $character->level }}</p>
    <p><strong>Owner:</strong> {{ $character->user->name }}</p>

    <a href="{{ route('characters.edit', $character) }}">Edit</a>

    <form action="{{ route('characters.destroy', $character) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

    <h2>Inventory</h2>

    @if ($character->inventories->isEmpty())
        <p>Empty inventory.</p>
    @else
        <ul>
            @foreach ($character->inventories as $inventory)
                <li>
                    {{ $inventory->item->name }}
                    - Type: {{ $inventory->item->type }}
                    - Slot: {{ $inventory->item->slot ?? 'none' }}
                    - Power: {{ $inventory->item->power }}
                    - Quantity: {{ $inventory->quantity }}
                    - Equipped: {{ $inventory->equipped ? 'Yes' : 'No' }}
                </li>
            @endforeach
        </ul>
    @endif

    <p>
        <a href="{{ route('characters.index.web') }}">Back to list</a>
    </p>
@endsection
