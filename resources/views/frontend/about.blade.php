@extends('layouts.app')
@section('title', 'About Us')
@section('content')
<style>
    .title-section h2 {
        font-size: 28px;
        font-weight: bold;

    }

    .title-section {
        position: relative;
        /* Essential for positioning the pseudo-element */
        /* Other styles for your element */
        padding-bottom: 10px;
    }

    .title-section::after {
        content: '';
        position: absolute;
        bottom: 0;
        /* Position at the bottom */
        left: 0;
        width: 100%;
        height: 4px;
        /* Desired border thickness */
        background: linear-gradient(to right, #667be7, #754ca4);
        /* Apply gradient */
        z-index: -1;
        /* Place behind the main element */
        /* Add border-radius if needed for rounded corners */
    }

    /* linear-gradient(to right, #667be7, #754ca4) */
</style>
<div id="about-page">
    <div class="container page-content mt-5">
  <!-- AdSense Block -->
        <div class="adsense-block">
            <i class="fas fa-ad fa-2x mb-3"></i>
            <h4>Google AdSense </h4>
        </div>
        <div class="title-section mb-4">
            <h2>About Us</h2>
        </div>
        <div class="mb-4 content">
            {{-- <i class="fas fa-info-circle fa-2x mb-3"></i> --}}

            <p>Welcome to our Game Portal! We are passionate about providing the best gaming experience for our users.
                Our platform offers a wide variety of games across different genres, ensuring there's something for
                everyone.</p>
            <p>Our mission is to create a fun and engaging environment where gamers can discover new titles, connect
                with fellow enthusiasts, and enjoy high-quality content. We are committed to continuously improving our
                site and adding exciting features to enhance your gaming journey.</p>

            <p>Thank you for being a part of our community. We hope you have a fantastic time exploring and playing the
                games we have to offer!</p>
            <p>Happy Gaming!</p>
        </div>

        
    </div>
</div>
@endsection