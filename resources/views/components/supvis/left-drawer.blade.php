<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Halo,!</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                SuperVisor
            </li>

            <x-nav-link href="/supvis/home" :active="request()->is('supvis/home')">Home</x-nav-link>
            <x-nav-link href="/insentif" :active="request()->is('insentif')">Insentif</x-nav-link>
            <x-nav-link href="/produk" :active="request()->is('produk')">Produk</x-nav-link>
            <x-nav-link href="/merch" :active="request()->is('merch')">Merch</x-nav-link>
            <x-nav-link href="/add_sales" :active="request()->is('add_sales')">Add Sales</x-nav-link>
            <x-nav-link href="/add_supvis" :active="request()->is('add_supvis')">Add Supervisor</x-nav-link>
            
    </div>
</nav>
