@extends('layouts.app_dashboard')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Category</h1>
            </div>

        </div>
    </div><!-- /.container-fluid -->
</section>


<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Category List</h3>
                </div>
                {{-- Success message --}}
                @if(session('success'))
                <div id="message" class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                            $id = '1';
                            @endphp

                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $id++ }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->category_status }}</td>
                                <td>
                                    {{-- <a href="{{ route('categories.index', $category->id) }}"
                                        class="btn btn-primary">Edit</a> --}}


                                    <button class="btn btn-primary btn-sm editBtn" data-id="{{ $category->id }}"
                                        data-name="{{ $category->category_name }}"
                                        data-status="{{ $category->category_status }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-6">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Category Creation</h3>

                </div>
                <div class="card-body">
                    <form id="categoryForm" action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="category_id">
                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input type="text" name="category_name" id="category_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="category_status">Category Status</label>
                            <select name="category_status" id="category_status" class="form-control" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <button type="submit" id="formSubmitBtn" class="btn btn-success">Add Category</button>
                        <button type="button" class="btn btn-info" id="clearBtn">Clear</button>
                    </form>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection
@push('custom_scripts')
<script>
    document.querySelectorAll('.editBtn').forEach(button => {
            button.addEventListener('click', function () {
            let id = this.getAttribute('data-id');
            let name = this.getAttribute('data-name');
            let status = this.getAttribute('data-status');

            // Form এ value বসাও
            document.getElementById('category_id').value = id;
            document.getElementById('category_name').value = name;
            document.getElementById('category_status').value = status;

            // Form action change
            let form = document.getElementById('categoryForm');
            form.action = '{{ route("categories.update", ":id") }}'.replace(':id', id);

            // Button text change
            document.getElementById('formSubmitBtn').textContent = 'Update Category';
            form.method = 'POST';
        });
    });
// massage hiddend
    document.addEventListener("DOMContentLoaded", function() {
        let message = document.getElementById("message");
        if (message) {
            setTimeout(() => {
                message.style.transition = "opacity 0.5s ease";
                message.style.opacity = "0";
                setTimeout(() => message.remove(), 500);
            }, 3000); // ৩ সেকেন্ড পর hide হবে
        }
    });


    // Clear button
    document.getElementById('clearBtn').addEventListener('click', function () {
    let form = document.getElementById('categoryForm');

    // সব ইনপুট খালি করো
    form.querySelectorAll('input, textarea, select').forEach(field => {
        if (field.tagName === "SELECT") {
            field.selectedIndex = 0; // প্রথম option select হবে
        } else {
            field.value = "";
        }
    });

    // Submit Button টেক্সট রিসেট করো
    let submitBtn = document.getElementById('formSubmitBtn');
    submitBtn.textContent = "Add Category";
    submitBtn.disabled = false; // আবার allow করো
});
</script>
@endpush
