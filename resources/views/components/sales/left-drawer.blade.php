<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand">
            <span class="align-middle">{{ Auth::user()->name }}</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Dashboard
            </li>

            <x-nav-link href="{{ route('sales.home') }}" :active="request()->is('programhaji/sales/home')">Home</x-nav-link>
            <x-nav-link href="{{ route('sales.transaksi') }}" :active="request()->is('programhaji/sales/transaksi')">Transaksi </x-nav-link>
            <x-nav-link href="{{ route('sales/rekap') }}" :active="request()->is('programhaji/sales/rekap')">Pendapatanmu</x-nav-link>
    </div>
</nav>
