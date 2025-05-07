<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand">
            <span class="align-middle">{{ Auth::user()->name }}</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Dashboard
            </li>

            <x-nav-link href="{{ route('kasir.home') }}" :active="request()->is('programhaji/sales/home')">Home</x-nav-link>
            <x-nav-link href="{{ route('transaksi.approve') }}" :active="request()->is('programhaji/supvis/approvetransaksi')">Approve Transaksi</x-nav-link>
            <x-nav-link href="{{ route('supvis.transactions.index') }}" :active="request()->is('programhaji/supvis/riwayat-transaksi')">Riwayat Transaksi</x-nav-link>
    </div>
</nav>
