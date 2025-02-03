<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Halo,!</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                SuperVisor
            </li>

            <x-nav-link href="{{ route('supvis.home') }}" :active="request()->is('supvis/home') || request()->is('supvis/budget-insentif')">Home</x-nav-link>
            <x-nav-link href="/produk" :active="request()->is('produk/*', 'produk')">Produk</x-nav-link>
            <x-nav-link href="/merch" :active="request()->is('merch', 'merch/*')">Merch</x-nav-link>
            <x-nav-link href="/tambah-sales" :active="request()->is('tambah-sales')">Add Sales</x-nav-link>
            <x-nav-link href="/sales-checklist" :active="request()->is('sales-checklist')">Checklist Sales </x-nav-link>
            <x-nav-link href="/supvis/riwayat-transaksi" :active="request()->is('supvis/riwayat-transaksi')">Riwayat Transaksi</x-nav-link>
            @if(Auth::user() && Auth::user()->is_superuser)
                <x-nav-link href="/tambah-supvis" :active="request()->is('tambah-supvis')">Add Supervisor</x-nav-link>
            @endif


    </div>
</nav>
