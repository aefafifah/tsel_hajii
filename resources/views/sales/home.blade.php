<x-sales.saleslayouts>
<main class="content">
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
</main>

</x-sales.saleslayouts>