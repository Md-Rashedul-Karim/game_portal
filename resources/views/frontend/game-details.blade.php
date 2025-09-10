@extends('layouts.app')

@section('content')
<style>
    /* #gameContainer {
        display: none;
    } */

    /* Default panel */
    #gamePanel {
        transition: all 0.5s ease;
    }

    /* When playing, image hide & info full width */
    #gamePanel.game-playing #game-image {
        display: none;
    }

    #gamePanel.game-playing #game-info {
        flex: 0 0 100%;
        max-width: 100%;
    }
</style>
<!-- Game Detail Page -->
<div id="detail-page">
    <div class="container page-content mt-5">
        <div class="game-detail-hero">
            <div class="row align-items-center p-3" id="gamePanel">
                <div class="col-lg-4" id="game-image">
                    <img src="{{ asset('uploads/games/' . $gamepost->game_image) }}" alt="Game Image"
                        class="img-thumbnail" width="100%">
                </div>
                <div class="col-lg-8" id="game-info">
                    <!-- Hidden Game Container -->
                    <div id="gameContainer" class="d-none ">
                        <div class="row">
                            <div class="col-2">
                                <div class="side-adsense-block">
                                    <i class="fas fa-ad fa-2x mb-3"></i>
                                    <h4>Google AdSense</h4>
                                    <p>Your AdSense code will go here.</p>
                                </div>
                            </div>
                            <div class="col-8">
                                <iframe id="gameIframe" src="" width="100%" height="500px" frameborder="0"
                                    allowfullscreen></iframe>
                            </div>
                            <div class="col-2">
                                <div class="side-adsense-block">
                                    <i class="fas fa-ad fa-2x mb-3"></i>
                                    <h4>Google AdSense</h4>
                                    <p>Your AdSense code will go here.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="gameSection">
                        <h1 id="game-title">{{ $gamepost->game_title }}</h1>

                        <div class="mb-3">
                            <p id="game-short-description">{{ strip_tags($gamepost->game_content) }}</p>
                        </div>
                        <div class="d-flex gap-3 mb-5">
                            <a href="javascript:void(0);" id="playNowBtn" class="btn-gradient btn-lg">Play Now</a>

                            {{-- <a href="{{ $gamepost->url }}" id="playNowBtn" target="_blank" class="btn-gradient btn-lg">Play
                                Now</a> --}}
                            <a href="javascript:void(0);" id="closeGameBtn" class="btn btn-danger btn-lg d-none">Close
                                Game</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- AdSense Block -->
        <div class="adsense-block">
            <i class="fas fa-ad fa-2x mb-3"></i>
            <h4>Google AdSense</h4>
            <p>Your AdSense code will go here.</p>
        </div>

        <div class="row mt-5">
            <div class="col-lg-8">
                <!-- Game Details -->
                <div class="game-card p-4 mb-4">
                    <h2>About This Game</h2>
                    <p id="game-full-description">
                    <p>{!! $gamepost->game_content !!}</p>
                    </p>



                    <h4 class="mt-4">System Requirements</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Minimum:</h6>
                            <ul class="small">
                                <li>OS: Windows 10 64-bit</li>
                                <li>Processor: Intel Core i3-4160</li>
                                <li>Memory: 8 GB RAM</li>
                                <li>Graphics: NVIDIA GTX 950</li>
                                <li>Storage: 75 GB</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6>Recommended:</h6>
                            <ul class="small">
                                <li>OS: Windows 10/11 64-bit</li>
                                <li>Processor: Intel Core i5-4670</li>
                                <li>Memory: 16 GB RAM</li>
                                <li>Graphics: NVIDIA GTX 1060</li>
                                <li>Storage: 75 GB SSD</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Game Info Card -->
                <div class="game-card p-4 mb-4">
                    <h5>Game Info</h5>
                    <hr>
                    <div class="mb-3">
                        <strong>Release Date:</strong><br>
                        <small>{{ \Carbon\Carbon::parse($gamepost->game_publish_at)->format('d M Y') }}</small>

                    </div>
                    <div class="mb-3">
                        <strong>Genres:</strong><br>
                        <small>{{ $gamepost->category->category_name }}</small>
                    </div>
                    <div class="mb-3">
                        <strong>Platforms:</strong><br>
                        <small>{{ $gamepost->game_platform }}</small>
                    </div>

                </div>

                <!-- AdSense Block -->
                <div class="adsense-block">
                    <i class="fas fa-ad fa-2x mb-3"></i>
                    <h4>Google AdSense</h4>
                    <p>300x250 size</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('custom_scripts')

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const playBtn = document.getElementById("playNowBtn");
    const closeBtn = document.getElementById("closeGameBtn");

    const gameContainer = document.getElementById("gameContainer");
    const gameIframe = document.getElementById("gameIframe");
    const gamePanel = document.getElementById("gamePanel");
    const gameImage = document.getElementById("game-image");
    const gameInfo = document.getElementById("game-info");
    const gameSection = document.getElementById("gameSection");
    const gameTitle = document.getElementById("game-title");

    const gameShortDescription = document.getElementById("game-short-description");

    if (gameShortDescription) {
        const longText = gameShortDescription.textContent.trim();

        // ৫০ character এর বেশি হলে কাটবো
        const truncatedText = longText.length > 50
            ? longText.substring(0, 50) + "..."
            : longText;

        gameShortDescription.textContent = truncatedText;
    }

    playBtn.addEventListener("click", function () {


        // Add flexbox centering
        gameSection.classList.add("d-flex", "flex-column", "align-items-center", "justify-content-center");
        // gameSection.style.minHeight = "100vh"; // Full screen center

        // Load game URL dynamically
        gameIframe.src = "{{ $gamepost->game_url }}";

        // Expand panel for game
        gamePanel.classList.add("game-playing");
        gameContainer.classList.remove("d-none");

        gameShortDescription.classList.add("visually-hidden");
        gameTitle.classList.add("mt-3");

        // Hide Play, Show Close
        playBtn.classList.add("d-none");
        closeBtn.classList.remove("d-none");

        // Smooth scroll to game
        gameContainer.scrollIntoView({ behavior: "smooth" });
    });

    closeBtn.addEventListener("click", function () {
        // Stop the game
        gameIframe.src = "";
        gameTitle.classList.remove("mt-3");
        gameShortDescription.classList.remove("visually-hidden");

         // Remove centering (go back normal)
        gameSection.classList.remove("d-flex", "flex-column", "align-items-center", "justify-content-center");
        gameSection.style.minHeight = "auto";


        // Restore panel size
        gamePanel.classList.remove("game-playing");
        gameContainer.classList.add("d-none");

        // Show Play, Hide Close
        playBtn.classList.remove("d-none");
        closeBtn.classList.add("d-none");
    });
});
</script>



@endpush
