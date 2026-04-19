@extends('layouts.app')

@section('content')
    <h1>Edit character</h1>

    <form action="{{ route('characters.update', $character) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $character->name) }}" required>
        </div>

        <div>
            <label>Level</label>
            <input type="number" name="level" value="{{ old('level', $character->level) }}" required>
        </div>

        <button type="submit">Update</button>
    </form>

    <p>
        <a href="{{ route('characters.show.web', $character) }}">Back</a>
    </p>
@endsection
