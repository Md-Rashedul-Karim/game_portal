@extends('layouts.app')
@section('title', 'Contact Us')
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
<div id="contact-page">
    <div class="container page-content mt-5">
        <div class="title-section mb-4">
            <h2>Contact Us</h2>
        </div>
        @if(session('success'))
            <div id="alert-message" class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div id="alert-message" class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- <p>If you have any questions, suggestions, or feedback, please feel free to reach out to us using the form
            below. We value your input and will get back to you as soon as possible.</p> --}}
        <br>
        <br>

        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="company">Company</label>
                        <input type="text" name="company" class="form-control" id="company" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" class="form-control" id="subject" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="message">Message</label>
                        <textarea name="message" class="form-control" id="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>

            </div>
            <div class="col-md-6">
                <h4>Our Contact Information</h4>
                <p>Email: <a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a></p>
                <p>Phone: +123-456-7890</p>
                <p>Address: 123 Main St, Anytown, USA</p>
            </div>
        </div>
        <!-- AdSense Block -->
        <div class="adsense-block">
            <i class="fas fa-ad fa-2x mb-3"></i>
            <h4>Google AdSense </h4>
        </div>
        <br>
        <br>

    </div>
</div>
@endsection
@push('custom_scripts')
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
<script>
    // 5 সেকেন্ড পরে alert লুকিয়ে যাবে
    setTimeout(function () {
        let alertBox = document.getElementById('alert-message');
        if (alertBox) {
            let bsAlert = new bootstrap.Alert(alertBox);
            bsAlert.close();
        }
    }, 4000); // 4000ms = 4 seconds
</script>
@endpush
