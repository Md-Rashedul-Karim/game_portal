@extends('layouts.app')
@section('title', 'privacy policy')
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

    .adsense-left-block,
    .adsense-right-block {
        text-align: center;
        margin-bottom: 20px;
        padding: 15px;
        border: 2px dashed #ccc;
        border-radius: 10px;
        height: 35vh;
        
    }
      .adsense-left-block h4,
    .adsense-right-block h4 {
        font-size: calc(0.9rem + 0.5vw);
    }
</style>
<div id="privacy-policy-page">
    <div class="container page-content mt-5">
        <!-- AdSense Block -->
        <div class="adsense-block">
            <i class="fas fa-ad fa-2x mb-3"></i>
            <h4>Google AdSense </h4>
        </div>

        <div class="row mt-4">
            <div class="col-md-2">
                <div class="adsense-left-block mt-3">
                    <i class="fas fa-ad fa-2x mb-3"></i>
                    <h4>Google AdSense </h4>
                </div>
            </div>
            <div class="col-md-8">
                <div class="title-section mb-4">
                    <h2>Privacy Policy</h2>
                </div>
                <p>Your privacy is important to us. This privacy policy explains how we collect, use, and protect your
                    personal information when you use our website.</p>
                <p>We may collect personal information such as your name, email address, and browsing behavior to
                    improve
                    your experience on our site. We use this information to provide personalized content, analyze site
                    traffic, and communicate with you about updates and promotions.</p>
                <p>By using our website, you consent to the collection and use of your personal information as described
                    in
                    this privacy policy.</p>
                <p>This privacy policy is effective as of the date it is posted. If you have any questions or concerns
                    about our privacy
                    practices, please contact us at <a href="mailto:{{ config('mail.from.address') }}">{{
                        config('mail.from.address') }}</a>.</p>"</p>
            </div>
            <div class="col-md-2">

                <div class="adsense-right-block mt-3">
                    <i class="fas fa-ad fa-2x mb-3"></i>
                    <h4>Google AdSense </h4>
                </div>
            </div>

        </div>
    </div>


    @endsection