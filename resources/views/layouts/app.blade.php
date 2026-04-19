<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPG Inventory</title>
</head>
<body>
    <nav>
        <a href="{{ route('characters.index.web') }}">Characters</a>

        @auth
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endauth
    </nav>

    @if (session('success'))
        <div>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <hr>

    @yield('content')
</body>
</html>
