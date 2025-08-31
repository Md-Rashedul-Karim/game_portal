@extends('layouts.app_dashboard')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Create Game Post</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Create Game Post</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Game Post</h3>
                </div>
                <div class="card-body">
                    <form id="gameForm" action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="game_title">Game Title</label>
                            <input type="text" class="form-control" id="game_title" name="game_title" required>
                        </div>

                        <!-- ✅ Game Category Dropdown -->
                        <div class="form-group">
                            <label for="category_id">Game Category</label>
                            <select id="category_id" name="category_id" class="form-control" required>
                                <option value="">-- Select Category --</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- ✅ End Category -->

                        <div class="form-group">
                            <label for="game_content">Game Content</label>
                            <textarea class="form-control" id="game_content" name="game_content" rows="4"
                               ></textarea>
                        </div>

                        <div class="form-group">
                            <label for="game_image">Game Image</label>
                            <input type="file" id="game_image" name="game_image" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label for="game_url">Game URL</label>
                            <input type="url" id="game_url" name="game_url" class="form-control">
                        </div>

                        {{-- <div class="form-group">
                            <label for="game_genres">Game Genres</label>
                            <input type="text" id="game_genres" name="game_genres" class="form-control">
                        </div> --}}

                        <div class="form-group">
                            <label for="game_platform">Game Platform</label>
                            <input type="text" id="game_platform" name="game_platform" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="game_status">Game Status</label>
                            <select id="game_status" name="game_status" class="form-control">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="game_publish_at">Publish Date</label>
                            {{-- <input type="datetime-local" id="game_publish_at" name="game_publish_at"
                                class="form-control"> --}}
                            <input type="date" class="form-control" id="game_publish_at" name="game_publish_at"
                                value="{{ date('Y-m-d') }}">
                        </div>

                         <div class="form-group">
                            <label for="game_banner">Game Banner</label>
                            <select id="game_banner" name="game_banner" class="form-control">
                                <option value="inactive" {{ old('game_banner') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="active" {{ old('game_banner') == 'active' ? 'selected' : '' }}>Active</option>
                            </select>
                        </div>

                        <button type="submit" id="formSubmitBtn" class="btn btn-success w-100 my-3">Save Game</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('custom_scripts')
<script>
   $(document).ready(function() {
            $('#gameForm').on('submit', function(e) {
                e.preventDefault();

                // Prevent the default form submission
                // Perform form validation here
                let isValid = true;

                // Check required fields
                $('#gameForm [required]').each(function() {
                    if (!$(this).val()) {
                        isValid = false;
                        $(this).addClass('is-invalid');
                    } else {
                        $(this).removeClass('is-invalid');
                    }
                });

                if (!isValid) {
                    // Show error message
                    alert('Please fill in all required fields.');
                    return;
                }

                // If valid, submit the form
                this.submit();
            });
        });
</script>
@endpush
