<x-supvis.supvislayouts>
<main class="content">
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
</main>
</x-supvis.supvislayouts>
