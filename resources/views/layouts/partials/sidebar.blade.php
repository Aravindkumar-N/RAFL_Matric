<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ (request()->route()->getName() == 'm_dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('dashboard')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ (request()->route()->getName() == 'm_category.index') ? 'active' : '' }}">
            <a class="nav-link"  href="{{route('category.index')}}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Category</span>
            </a>
        </li>
        <li class="nav-item {{ (request()->route()->getName() == 'gallery.index') ? 'active' : '' }}">
            <a class="nav-link"  href="{{route('gallery.index')}}">
                <i class="bi bi-images menu-icon"></i>
                <span class="menu-title">Gallery</span>
            </a>
        </li>
       
    </ul>
</nav>
