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
            
    </div>
</nav>
