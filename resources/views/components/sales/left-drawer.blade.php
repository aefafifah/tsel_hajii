<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Halo,!</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Sales
            </li>

            <x-nav-link href="/sales/home" :active="request()->is('sales/home')">Home</x-nav-link>
            <x-nav-link href="/sales/transaksi" :active="request()->is('sales/transaksi')">Transaksi</x-nav-link>
            <x-nav-link href="/sales/riwayat-transaksi" :active="request()->is('sales/RiwayatTransaksi')">Riwayat Transaksi</x-nav-link>
    </div>
</nav>
