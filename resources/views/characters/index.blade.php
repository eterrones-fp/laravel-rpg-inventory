@extends('layouts.app')

@section('content')
    <h1>Characters</h1>

    <a href="{{ route('characters.create') }}">Create character</a>

    <ul>
        @foreach ($characters as $character)
            <li>
                <strong>{{ $character->name }}</strong>
                - Level {{ $character->level }}

                @if ($character->user)
                    - Owner: {{ $character->user->name }}
                @endif

                <a href="{{ route('characters.show.web', $character) }}">View</a>
                <a href="{{ route('characters.edit', $character) }}">Edit</a>

                <form action="{{ route('characters.destroy', $character) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
