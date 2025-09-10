@extends('layouts.app')

@section('content')
<style>

    /* Floating action buttons */
    .floating-actions {
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        display: flex;
        flex-direction: column;
        gap: 1rem;
        z-index: 100;
    }

    .floating-btn {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        border: none;
        background: var(--accent-gradient);
        color: white;
        font-size: 1.2rem;
        cursor: pointer;
        transition: var(--transition);
        box-shadow: var(--shadow-light);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .floating-btn:hover {
        transform: scale(1.1);
        box-shadow: var(--shadow-heavy);
    }
    /* Carousel Height */
    .carousel-inner {
        height: 60vh;
    }

    /* Responsive Design */
    @media (max-width: 992px) {

        /* Tablet */
        .animated-title {
            font-size: 1.5rem;
        }

        .animated-text {
            font-size: 1rem;
        }
    }

    @media (max-width: 768px) {

        /* Mobile */
        .animated-title {
            font-size: 1.2rem;
        }

        .animated-text {
            display: block;
            /* ছোট স্ক্রিনে হাইড হবে */
        }

        .animated-btn {
            font-size: 0.9rem;
            padding: 8px 16px;
        }

        .carousel-caption {
            bottom: 20px;
            /* বাটন নিচে নামবে */
        }
    }
        .loading-shimmer {
        position: relative;
        overflow: hidden;
    }

    .loading-shimmer::after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        animation: shimmer 2s infinite;
    }
    /* Responsive Design */
    @media (max-width: 992px) {

        /* Tablet */
        .animated-title {
            font-size: 1.5rem;
        }

        .animated-text {
            font-size: 1rem;
        }
          .ads-left,
        .ads-right {
            display: none;
        }
    }

    @media (max-width: 768px) {

        /* Mobile */
        .animated-title {
            font-size: 1.2rem;
        }

        .animated-text {
            display: block;
        }

        .animated-btn {
            font-size: 0.9rem;
            padding: 8px 16px;
        }

        .carousel-caption {
            bottom: 20px;
        }
    }
</style>
<div id="home-page" class="active-page">
    <div class="container">
           <!-- Hero Slider -->
    <section class="hero-section mt-5">
        <div id="gameSlider" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000" {{--
            প্রতি 5 সেকেন্ডে স্লাইড হবে --}} data-bs-pause="hover"> {{-- মাউস গেলে থেমে যাবে --}}

            <!-- Indicators -->
            <div class="carousel-indicators">
                @foreach ($gameBanners as $index => $gamepost)
                <button type="button" data-bs-target="#gameSlider" data-bs-slide-to="{{ $index }}"
                    class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : 'false' }}"
                    aria-label="Slide {{ $index + 1 }}">
                </button>
                @endforeach
            </div>

            <!-- Carousel Items -->
            <div class="carousel-inner">
                @foreach ($gameBanners as $gamepost)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ asset('uploads/games/' . $gamepost->game_image) }}" class="d-block w-100"
                        alt="{{ $gamepost->game_title }}" style="object-fit: fill;">

                    <div class="carousel-caption d-md-block text-center">
                        <h5 class="animated-title">{{ $gamepost->game_title }}</h5>

                        <a href="{{ route('game-details', $gamepost->id) }}" class="btn-gradient animated-btn">Play Now</a>

                        <!-- Progress Bar -->
                        {{-- <div class="progress mt-3" style="height: 5px; background: rgba(255,255,255,0.3);">
                            <div class="progress-bar" role="progressbar"></div>
                        </div> --}}
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#gameSlider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#gameSlider" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>


    </section>
        <!-- AdSense Block -->
        <div class="adsense-block mt-5">
            <i class="fas fa-ad fa-2x mb-3"></i>
            <h4>Google AdSense</h4>
            <small>size: 728x90 or 320x50 </small>
        </div>

        <!-- Game Categories -->
        <section class="py-5">
            <h2 class="section-title">Game Categories</h2>
            <div class="row g-4">
                @php
                $icons = [
                'action' => 'fas fa-fire',
                'racing' => 'fas fa-car',
                'puzzle' => 'fas fa-puzzle-piece',
                'adventure' => 'fas fa-hat-wizard',
                'sports' => 'fas fa-football-ball',
                ];
                @endphp

                @foreach ($categories as $category)
                <div class="col-md-4">
                    <a href="{{ route('category.index', $category->id) }}"
                        style="text-decoration: none; color: inherit;">
                        <div class="category-card">
                            <i class="{{ $icons[$category->category_name] ?? 'fas fa-gamepad' }}"></i>
                            <h5>{{ $category->category_name }}</h5>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </section>
        <!-- New Games -->
        <section class="py-5 new-games">
            <h2 class="section-title">New Games</h2>
            <div class="row g-4" id="game-list">
                <!-- প্রথম ৩টা কার্ড -->
                @foreach ($gameposts as $index => $gamepost)
                <div class="col-lg-4 col-md-6 game-card-item {{ $index >= 3 ? 'd-none' : '' }}">
                    <a class="game-title" href="{{ route('game-details', $gamepost->id) }}">
                        <div class="card mb-4">
                            <img src="{{ asset('uploads/games/' . $gamepost->game_image) }}"
                                alt="{{ $gamepost->game_title }}" style="height: 15rem; width: 100%;"
                                class="img-thumbnail card-img-top">

                            {{-- <img src="{{ $gamepost->image_url }}" class="card-img-top"
                                alt="{{ $gamepost->game_title }}"> --}}
                            <div class="card-body">
                                <h5 class="card-title">{{ $gamepost->game_title }}</h5>
                                <p class="card-text">{{ $gamepost->description }}</p>
                                <a href="{{ route('game-details', $gamepost->id) }}" class="btn btn-primary">Play
                                    Now</a>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <!-- Load More Button -->

            @if ($gameposts->count() > 3)
                <div class="text-center mt-3">
                    <button id="loadMoreBtn" class="btn btn-info w-100 my-4">More Game</button>
                </div>
            @endif

        </section>

        <!-- AdSense Block -->
        <div class="adsense-block">
            <i class="fas fa-ad fa-2x mb-3"></i>
            <h4>Google AdSense</h4>
            <small>size: 728x90 or 320x50 </small>
        </div>
    </div>
</div>


@endsection
@push('custom_scripts')


<script>
    document.addEventListener("DOMContentLoaded", function () {
        let loadMoreBtn = document.getElementById("loadMoreBtn");
        let hiddenCards = document.querySelectorAll(".game-card-item.d-none");
        let visibleCount = 3; // শুরুতে ৩টা visible

        loadMoreBtn.addEventListener("click", function () {
            let hidden = document.querySelectorAll(".game-card-item.d-none");
            for (let i = 0; i < 3 && i < hidden.length; i++) {
                hidden[i].classList.remove("d-none");
            }

            // সব দেখানো হয়ে গেলে button hide করে দেবে
            if (document.querySelectorAll(".game-card-item.d-none").length === 0) {
                loadMoreBtn.style.display = "none";
            }
        });
    });
</script>
<!-- Custom Script for Progress Bar + Animation -->

@endpush
