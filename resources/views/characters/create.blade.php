@extends('layouts.app')

@section('content')
    <h1>Create character</h1>

    <form action="{{ route('characters.store') }}" method="POST">
        @csrf

        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label>Level</label>
            <input type="number" name="level" value="{{ old('level', 1) }}" required>
        </div>

        <button type="submit">Create</button>
    </form>

    <p>
        <a href="{{ route('characters.index.web') }}">Back</a>
    </p>
@endsection
