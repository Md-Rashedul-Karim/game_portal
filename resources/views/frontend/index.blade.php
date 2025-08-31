@extends('layouts.app')

@section('content')
<style>
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
</style>
<div id="home-page" class="active-page">
    <div class="container">
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
