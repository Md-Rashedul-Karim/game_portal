@extends('layouts.app')

@section('content')
<div id="categories-page">
    <div class="container page-content mt-5">
        <!-- AdSense Block -->
        <div class="adsense-block">
            <i class="fas fa-ad fa-2x mb-3"></i>
            <h4>Google AdSense </h4>

        </div>

        @foreach ($categories as $category)
        <section class="action-game mb-5">
            @if($category->gameposts->count() > 0)
            <h2 class="category-section-title">{{ $category->category_name }}</h2>

            <div class="row g-4 game-list" id="game-list-{{ $category->id }}">
                @foreach($category->gameposts as $index => $game)
                <div class="col-lg-4 col-md-6 game-card-item game-item-{{ $category->id }}
            {{ $index >= 3 ? 'd-none' : '' }}">
                    <a class="game-title" href="{{ route('game-details', $game->id) }}">
                        <div class="card h-100 shadow-sm">
                            @if($game->game_image)
                            <img src="{{ asset('uploads/games/' . $game->game_image) }}" alt="{{ $game->game_title }}"
                                style="height: 15rem; width: 100%;" class="img-thumbnail card-img-top">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $game->game_title }}</h5>
                                <p class="card-text">{{ Str::limit($game->game_content, 80) }}</p>
                                <a href="{{ route('game-details', $game->id) }}" class="btn btn-sm btn-primary"
                                    >Play Now</a>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            @else
            <p>No games available in this category.</p>
            @endif

            <!-- Load More Button -->
            @if($category->gameposts->count() > 3)
            <div class="text-center mt-4">
                <button class="btn btn-primary loadMoreBtn" data-category="{{ $category->id }}">
                    More Games
                </button>
            </div>
            @endif
        </section>
        @endforeach



        <!-- AdSense Block -->
        <div class="adsense-block">
            <i class="fas fa-ad fa-2x mb-3"></i>
            <h4>Google AdSense </h4>

        </div>

    </div>
</div>


@endsection
@push('custom_scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const loadMoreButtons = document.querySelectorAll(".loadMoreBtn");

    loadMoreButtons.forEach(button => {
        button.addEventListener("click", function () {
            let categoryId = this.getAttribute("data-category");
            let hiddenItems = document.querySelectorAll(
                `.game-item-${categoryId}.d-none`
            );

            // Show next 3 hidden items
            for (let i = 0; i < 3 && i < hiddenItems.length; i++) {
                hiddenItems[i].classList.remove("d-none");
            }

            // If no more hidden items, hide button
            if (document.querySelectorAll(`.game-item-${categoryId}.d-none`).length === 0) {
                this.style.display = "none";
            }
        });
    });
});


</script>
@endpush
