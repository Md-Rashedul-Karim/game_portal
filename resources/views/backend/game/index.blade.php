@extends('layouts.app_dashboard')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Game Posts</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Game Posts</li>
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
                    <h3 class="card-title">Game Posts</h3>
                    <div class="card-tools">
                        <a href="{{ route('games.create') }}" class="btn btn-primary btn-sm">Add New Game</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Banner</th>
                                <th>Platform</th>
                                <th>Url</th>
                                <th>Status</th>
                                <th>Published At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                   $sl = ($gameposts->currentPage() - 1) * $gameposts->perPage() + 1;
                            @endphp
                            @if ($gameposts->isEmpty())
                                <tr>
                                    <td colspan="10" class="text-center">No game posts found.</td>
                                </tr>
                                @else
                                @foreach ($gameposts as $gamepost)
                                    <tr>
                                        <td>{{ $sl++ }}</td>
                                        <td>{{ $gamepost->game_title }}</td>
                                        <td>{{ $gamepost->category->category_name ?? 'N/A' }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/games/' . $gamepost->game_image) }}" alt="Game Image" class="img-thumbnail" width="100">
                                        </td>
                                        <td>{{ $gamepost->game_banner }}</td>
                                        <td>{{ $gamepost->game_platform }}</td>
                                        <td><a href="{{ $gamepost->game_url }}" target="_blank">{{ $gamepost->game_url }}</a></td>
                                        <td>{{ $gamepost->game_status }}</td>
                                        <td>{{ \Carbon\Carbon::parse($gamepost->game_publish_at)->format('d M Y') }}</td>


                                        <td>
                                            <a href="{{ route('games.edit', $gamepost->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('games.destroy', $gamepost->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                     {{-- Pagination Section --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $gameposts->links('pagination::bootstrap-5') }}
    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('custom_scripts')

@endpush
