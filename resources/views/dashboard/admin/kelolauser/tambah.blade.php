@extends('layout.masteradmin')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary mb-2 mb-md-0">Form Tambah</h6>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role_id" class="form-control" required>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Optional: Add Profile Photo Input -->
                <div class="form-group">
                    <label for="photo">Profile Photo</label>
                    <input type="file" name="photo" class="form-control-file">
                </div>

                <!-- You can add more fields here as needed -->

                <button type="submit" class="btn btn-primary">Tambah User</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>

@endsection
