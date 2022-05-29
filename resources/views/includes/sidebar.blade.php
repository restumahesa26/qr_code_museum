<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img src="{{ url('logo.png') }}" alt="" style="width: 35px">
            <a href="index.html">UPTD Museum</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">UPTD</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown @if(Route::is('dashboard')) active @endif">
                <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Main Menu</li>
            <li class="dropdown @if(Route::is('data-kategori.*')) active @endif">
                <a href="{{ route('data-kategori.index') }}" class="nav-link"><i class="fas fa-tag"></i><span>Kategori</span></a>
            </li>
            <li class="dropdown @if(Route::is('data-sub-kategori.*')) active @endif">
                <a href="{{ route('data-sub-kategori.index') }}" class="nav-link"><i class="fas fa-tags"></i><span>Sub Kategori</span></a>
            </li>
            <li class="dropdown @if(Route::is('data-koleksi.*')) active @endif">
                <a href="{{ route('data-koleksi.index') }}" class="nav-link"><i class="fas fa-map"></i><span>Koleksi</span></a>
            </li>
            <li class="dropdown @if(Route::is('data-tanggapan.*')) active @endif">
                <a href="{{ route('data-tanggapan.index') }}" class="nav-link"><i class="fas fa-star"></i><span>Tanggapan</span></a>
            </li>
            <li class="dropdown @if(Route::is('data-pengguna.*')) active @endif">
                <a href="{{ route('data-pengguna.index') }}" class="nav-link"><i class="fas fa-users"></i><span>Data Pengguna</span></a>
            </li>
            <li class="menu-header">Profile</li>
            <li class="dropdown @if(Route::is('profile.*')) active @endif">
                <a href="{{ route('profile.edit') }}" class="nav-link"><i class="fas fa-user-alt"></i><span>Profile</span></a>
            </li>
            <li class="dropdown">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('data-pengguna.index') }}" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fas fa-chevron-circle-left"></i><span>Logout</span></a>
                </form>

            </li>
        </ul>
    </aside>
</div>
