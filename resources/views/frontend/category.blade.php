@extends('layouts.app')

@section('content')
<div id="categories-page">
    <div class="container page-content mt-5">
        <section class="action-game">
            <h2 class="category-section-title">{{ $category->category_name }}</h2>
            <div class="row" id="gameCardContainer">
                @foreach ($gameposts as $index => $gamepost)
                <div class="col-lg-4 col-md-6 game-card-item {{ $index >= 3 ? 'd-none' : '' }}">
                    <a class="game-title" href="{{ route('game-details', $gamepost->id) }}">
                        <div class="card mb-4">
                          <img src="{{ asset('uploads/games/' . $gamepost->game_image) }}" alt="{{ $gamepost->game_title }}" style="height: 15rem; width: 100%;" class="img-thumbnail card-img-top">
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

            <div class="text-center mt-3">
                <button id="loadMoreBtn" class="btn btn-info w-100 my-4">Load More</button>
            </div>
        </section>

    </div>
</div>
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
@endsection
