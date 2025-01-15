<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supervisor Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome, {{ Auth::user()->name }}</h1>
            <h2>Supervisor Dashboard</h2>
        </header>

        <nav>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="#">Menu yang dapat diakses supervisor</a>
                </li>

                @if (Auth::user()->is_superuser)
                <li class="list-group-item">
                    <a href="#">Menu tambahan khusus superuser</a>
                </li>
                @endif
            </ul>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>

        </nav>

        <main>
            <h3>HALO SV!!</h3>
        </main>
    </div>
</body>
</html>
