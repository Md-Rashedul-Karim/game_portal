@extends('layouts.app')

@section('content')
<div id="home-page" class="active-page">
        <!-- Hero Slider -->
        <section class="hero-section mt-5">
            <div id="gameSlider" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#gameSlider" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#gameSlider" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#gameSlider" data-bs-slide-to="2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?w=1200&h=400&fit=crop"
                            class="d-block w-100" alt="Gaming">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Cyberpunk 2077</h5>
                            <p>Explore the futuristic Night City</p>
                            <a href="#" class="btn-gradient" onclick="showGameDetail('cyberpunk')">Play Now</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1552820728-8b83bb6b773f?w=1200&h=400&fit=crop"
                            class="d-block w-100" alt="Gaming">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>The Witcher 3</h5>
                            <p>Embark on an epic journey with Geralt</p>
                            <a href="#" class="btn-gradient" onclick="showGameDetail('witcher')">Play Now</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1493711662062-fa541adb3fc8?w=1200&h=400&fit=crop"
                            class="d-block w-100" alt="Gaming">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Call of Duty</h5>
                            <p>Join the intense battle</p>
                            <a href="#" class="btn-gradient" onclick="showGameDetail('cod')">Play Now</a>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#gameSlider" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#gameSlider" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
            <div class="container-fluid">
            </div>
        </section>

        <div class="container">
            <!-- AdSense Block -->
            <div class="adsense-block">
                <i class="fas fa-ad fa-2x mb-3"></i>
                <h4>Google AdSense</h4>
                <small>size: 728x90 or 320x50 </small>
            </div>

            <!-- Game Categories -->
            <section class="py-5">
                <h2 class="section-title">Game Categories</h2>
                <div class="row g-4">
                    @foreach ($categories as $category)
                        <div class="col-md-4">
                            <a href="#" style="text-decoration: none; color: inherit;">
                                <div class="category-card">
                                    <i class="fa-solid fa-fire"></i>
                                    <h5>{{ $category->category_name }}</h5>
                                    <p>{{ $category->game_count }} Game</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="col-md-4">
                        <a href="#" style="text-decoration: none; color: inherit;">
                            <div class="category-card">

                                <i class="fa-solid fa-fire"></i>
                                <!-- <i class="fas fa-sword"></i> -->
                                <h5>Action</h5>
                                <p>250+ Game</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#" style="text-decoration: none; color: inherit;">
                            <div class="category-card">
                                <i class="fas fa-car"></i>
                                <h5>Racing</h5>
                                <p>180+ Game</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#" style="text-decoration: none; color: inherit;">
                            <div class="category-card">
                                <i class="fas fa-puzzle-piece"></i>
                                <h5>Puzzle</h5>
                                <p>320+ Game</p>
                            </div>
                        </a>
                    </div>
                </div>
            </section>


            <!-- Popular Games -->
            <section class="py-5 popular-games">
                <h2 class="section-title">Popular Games</h2>
                <div class="row g-4" id="game-list">
                    <!-- প্রথম ৩টা কার্ড -->
                    <div class="col-lg-4 col-md-6 game-card-item">
                        <a class="game-title" href="{{ route('game-details', ['id' => 1]) }}">
                            <div class="game-card">
                                <img src="https://images.unsplash.com/photo-1552820728-8b83bb6b773f?w=400&h=250&fit=crop"
                                    alt="Popular Game 1">
                                <div class="p-4">
                                    <h5>The Witcher 3: Wild Hunt</h5>
                                    <div class="game-stats">
                                        <span class="rating">★★★★★ 4.9</span>
                                        <span>500K+ <i class="fa fa-play-circle"></i></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 game-card-item">
                        <a class="game-title" href="game-details.html">
                            <div class="game-card">
                                <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?w=400&h=250&fit=crop"
                                    alt="Popular Game 2">
                                <div class="p-4">
                                    <h5>Cyberpunk 2077</h5>
                                    <div class="game-stats">
                                        <span class="rating">★★★★☆ 4.6</span>
                                        <span>350K+ <i class="fa fa-play-circle"></i></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 game-card-item">
                        <a class="game-title" href="game-details.html">
                            <div class="game-card">
                                <img src="https://images.unsplash.com/photo-1493711662062-fa541adb3fc8?w=400&h=250&fit=crop"
                                    alt="Popular Game 3">
                                <div class="p-4">
                                    <h5>Call of Duty: Modern Warfare</h5>
                                    <div class="game-stats">
                                        <span class="rating">★★★★☆ 4.7</span>
                                        <span>800K+ <i class="fa fa-play-circle"></i></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- লুকানো কার্ড (প্রথমে hidden থাকবে) -->
                    <div class="col-lg-4 col-md-6 game-card-item d-none">
                        <div class="game-card">
                            <img src="https://images.unsplash.com/photo-1552820728-8b83bb6b773f?w=400&h=250&fit=crop"
                                alt="Popular Game 1">
                            <div class="p-4">
                                <h5>The Witcher 3: Wild Hunt</h5>
                                <div class="game-stats">
                                    <span class="rating">★★★★★ 4.9</span>
                                    <span>500K+ <i class="fa fa-play-circle"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 game-card-item d-none">
                        <div class="game-card">
                            <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?w=400&h=250&fit=crop"
                                alt="Popular Game 2">
                            <div class="p-4">
                                <h5>Cyberpunk 2077</h5>
                                <div class="game-stats">
                                    <span class="rating">★★★★☆ 4.6</span>
                                    <span>350K+ <i class="fa fa-play-circle"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 game-card-item d-none">
                        <div class="game-card">
                            <img src="https://images.unsplash.com/photo-1493711662062-fa541adb3fc8?w=400&h=250&fit=crop"
                                alt="Popular Game 3">
                            <div class="p-4">
                                <h5>Call of Duty: Modern Warfare</h5>
                                <div class="game-stats">
                                    <span class="rating">★★★★☆ 4.7</span>
                                    <span>800K+ <i class="fa fa-play-circle"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 game-card-item d-none">
                        <div class="game-card">
                            <img src="https://images.unsplash.com/photo-1552820728-8b83bb6b773f?w=400&h=250&fit=crop"
                                alt="Popular Game 1">
                            <div class="p-4">
                                <h5>The Witcher 3: Wild Hunt</h5>
                                <div class="game-stats">
                                    <span class="rating">★★★★★ 4.9</span>
                                    <span>500K+ <i class="fa fa-play-circle"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 game-card-item d-none">
                        <div class="game-card">
                            <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?w=400&h=250&fit=crop"
                                alt="Popular Game 2">
                            <div class="p-4">
                                <h5>Cyberpunk 2077</h5>
                                <div class="game-stats">
                                    <span class="rating">★★★★☆ 4.6</span>
                                    <span>350K+ <i class="fa fa-play-circle"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 game-card-item d-none">
                        <div class="game-card">
                            <img src="https://images.unsplash.com/photo-1493711662062-fa541adb3fc8?w=400&h=250&fit=crop"
                                alt="Popular Game 3">
                            <div class="p-4">
                                <h5>Call of Duty: Modern Warfare</h5>
                                <div class="game-stats">
                                    <span class="rating">★★★★☆ 4.7</span>
                                    <span>800K+ <i class="fa fa-play-circle"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 game-card-item d-none">
                        <div class="game-card">
                            <img src="https://images.unsplash.com/photo-1552820728-8b83bb6b773f?w=400&h=250&fit=crop"
                                alt="Popular Game 1">
                            <div class="p-4">
                                <h5>The Witcher 3: Wild Hunt</h5>
                                <div class="game-stats">
                                    <span class="rating">★★★★★ 4.9</span>
                                    <span>500K+ <i class="fa fa-play-circle"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 game-card-item d-none">
                        <div class="game-card">
                            <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?w=400&h=250&fit=crop"
                                alt="Popular Game 2">
                            <div class="p-4">
                                <h5>Cyberpunk 2077</h5>
                                <div class="game-stats">
                                    <span class="rating">★★★★☆ 4.6</span>
                                    <span>350K+ <i class="fa fa-play-circle"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 game-card-item d-none">
                        <div class="game-card">
                            <img src="https://images.unsplash.com/photo-1493711662062-fa541adb3fc8?w=400&h=250&fit=crop"
                                alt="Popular Game 3">
                            <div class="p-4">
                                <h5>Call of Duty: Modern Warfare</h5>
                                <div class="game-stats">
                                    <span class="rating">★★★★☆ 4.7</span>
                                    <span>800K+ <i class="fa fa-play-circle"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Load More Button -->
                <div class="text-center mt-4">
                    <button class="btn btn-primary" id="loadMoreBtn">Load More Games</button>
                </div>
            </section>

            <!-- AdSense Block -->
            <!-- <div class="adsense-block">
                <i class="fas fa-ad fa-2x mb-3"></i>
                <h4>Google AdSense বিজ্ঞাপন</h4>
                <p>এখানে আপনার AdSense কোড বসবে</p>
                <small>৩৩৬x২৮০ বা ৭২৮x৯০ সাইজের অ্যাড</small>
            </div> -->
        </div>
    </div>


@endsection
@push('custom_scripts')
<script>

</script>
@endpush
