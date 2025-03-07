<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Halo, {{ Auth::user()->name }}!</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Dashboard
            </li>

            <x-nav-link href="{{ route('supvis.home') }}" :active="request()->is('supvis/home') || request()->is('supvis/budget-insentif')">Home</x-nav-link>
            <x-nav-link href="/produk" :active="request()->is('produk/*', 'produk')">Produk</x-nav-link>
            <x-nav-link href="/merch" :active="request()->is('merch', 'merch/*')">Merch</x-nav-link>
            <x-nav-link href="/tambah-sales" :active="request()->is('tambah-sales')">Add Sales</x-nav-link>
            <x-nav-link href="/history-setoran" :active="request()->is('history-setoran')">Checklist Sales </x-nav-link>
            <x-nav-link href="/supvis/riwayat-transaksi" :active="request()->is('supvis/riwayat-transaksi')">Riwayat Transaksi</x-nav-link>
            <x-nav-link href="/pantau-stok" :active="request()->is('pantau-stok')">Pantau Stok</x-nav-link>
            <x-nav-link href="/supvis/budget-insentif/pantau" :active="request()->is('supvis/budget-insentif/pantau')">Pantau Budget</x-nav-link>
            @if(Auth::user() && Auth::user()->is_superuser)
                <x-nav-link href="/tambah-supvis" :active="request()->is('tambah-supvis')">Add Supervisor</x-nav-link>
            @endif
            <x-nav-link href="/supvis/void" :active="request()->is('supvis/void')">Void Transaksi</x-nav-link>


    </div>
</nav>
