<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Halo,!</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Sales
            </li>

            <x-sales.salesnav-link href="/sales/home" :active="request()->is('/sales/home')">Home</x-sales.salesnav-link>
            
    </div>
</nav>
