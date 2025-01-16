<x-layouts>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Opsional: CSS -->
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome, {{ Auth::user()->name }}</h1>
            <h2>Sales Dashboard</h2>
        </header>

        <nav>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </nav>

        <main>
            <h3>HALO SALES</h3>
            </ul>
        </main>
    </div>
</body>
</html>
</x-layouts>
