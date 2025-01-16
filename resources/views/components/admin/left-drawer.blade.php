<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Halo,!</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Admin
            </li>

            <x-admin.adminnav-link href="/admin/home" :active="request()->is('/admin/home')">Home</x-admin.adminnav-link>
            
    </div>
</nav>
