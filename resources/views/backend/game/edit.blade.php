@extends('layouts.app_dashboard')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Game Post</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Game Post</li>
                </ol>
            </div>
        </div>
    </div>
</div>


@php

    // dd($gamepost);

@endphp







<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Game Post</h3>
                </div>
                <div class="card-body">
                    <form id="gameForm" action="{{ route('games.update', $gamepost->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $gamepost->id }}">
                        <div class="form-group">
                            <label for="game_title">Game Title</label>
                            <input type="text" class="form-control" id="game_title" name="game_title" value="{{ $gamepost->game_title }}" required>
                        </div>
                        <!-- ✅ Game Category Dropdown -->
                        <div class="form-group">
                            <label for="category_id">Select Category</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $gamepost->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="game_content">Game Content</label>
                            <textarea class="form-control" id="game_content" name="game_content" rows="5">{{ $gamepost->game_content }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="game_image">Game Image</label>
                            <input type="file" class="form-control" id="game_image" name="game_image">
                            @if($gamepost->game_image)
                                <img src="{{ asset('uploads/games/' . $gamepost->game_image) }}" alt="Game Image" class="img-thumbnail mt-2" width="150">
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="game_url">Game URL</label>
                            <input type="url" class="form-control" id="game_url" name="game_url" value="{{ $gamepost->game_url }}">
                        </div>

                        {{-- <div class="form-group">
                            <label for="game_genres">Game Genres</label>
                            <input type="text" class="form-control" id="game_genres" name="game_genres" value="{{ $gamepost->game_genres }}">
                        </div> --}}

                        <div class="form-group">
                            <label for="game_platform">Game Platform</label>
                            <input type="text" class="form-control" id="game_platform" name="game_platform" value="{{ $gamepost->game_platform }}">
                        </div>

                        <div class="form-group">
                            <label for="game_status">Game Status</label>
                            <select class="form-control" id="game_status" name="game_status">
                                <option value="published" {{ $gamepost->game_status == 'published' ? 'selected' : '' }}>Published</option>
                                <option value="draft" {{ $gamepost->game_status == 'draft' ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="game_publish_at">Game Publish Date</label>
                            <input type="date" class="form-control" id="game_publish_at" name="game_publish_at" value="{{ \Carbon\Carbon::parse($gamepost->game_publish_at)->format('Y-m-d') }}">
                        </div>
                       <div class="form-group">
                            <label for="game_banner">Banner</label>
                            <select class="form-control" id="game_banner" name="game_banner">
                                <option value="active" {{ $gamepost->game_banner == 'active' ? 'selected' : '' }}>active</option>
                                <option value="inactive" {{ $gamepost->game_banner == 'inactive' ? 'selected' : '' }}>inactive</option>
                            </select>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success w-100 my-3">Update Game Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('custom_scripts')
    <script>

    </script>
@endpush
