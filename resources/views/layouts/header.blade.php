 <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-gamepad me-2"></i>Game Portal
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.category') }}">
                            <i class="fas fa-th-large me-1"></i>Categories
                        </a>
                    </li>

                </ul>
            </div>
            <div class="ms-auto">
                <button id="modeToggle" class="btn btn-outline-light mode-toggle">🌙 </button>
            </div>
        </div>
    </nav>
