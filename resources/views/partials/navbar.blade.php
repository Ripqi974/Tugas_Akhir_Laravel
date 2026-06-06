<nav class="navbar navbar-expand-lg navbar-dark bg-danger custom-navbar">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
            <i class="bi bi-car-front-fill"></i> CIBADUYUT TOYOTA
        </a>

        <div class="d-flex align-items-center">
            @guest
                <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-light">Register</a>
            @endguest

            @auth
                <span class="text-white me-3">Halo, <strong>{{ Auth::user()->name }}</strong> ({{ strtoupper(Auth::user()->role) }})</span>
                
                <a href="{{ route('profile.edit') }}" class="btn btn-warning btn-sm me-2">
                    <i class="bi bi-person-circle"></i> Profile
                </a>

                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-light btn-sm">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            @endauth
        </div>
    </div>
</nav>