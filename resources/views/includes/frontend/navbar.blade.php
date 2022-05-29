<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary">
            <img src="{{ url('logo.png') }}" alt="" width="40">
            UPTD Museum
        </h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('home') }}" class="nav-item nav-link @if(Route::is('home')) active @endif">Home</a>
            <a href="{{ route('scan') }}" class="nav-item nav-link @if(Route::is('scan')) active @endif">Scan</a>
            <a href="{{ route('about-us') }}" class="nav-item nav-link @if(Route::is('about-us')) active @endif">Testimoni</a>
            @if (Auth::user())
            <a href="{{ route('dashboard') }}" class="nav-item nav-link @if(Route::is('dashboard')) active @endif">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="nav-item nav-link" style="color: #F32424 !important;" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </form>
            @else
                <a href="{{ route('login') }}" class="nav-item nav-link" style="color: #242F9B !important;"><i class="fas fa-sign-in-alt"></i> Login</a>
            @endif
        </div>
    </div>
</nav>
<!-- Navbar End -->
