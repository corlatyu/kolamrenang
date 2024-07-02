@extends('layout.masteradmin')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary mb-2 mb-md-0">Form Edit</h6>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Leave blank to keep current password">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <!-- Optional: Displaying Current Profile Photo -->
                @if ($user->photo)
                <div class="form-group">
                    <label for="current_photo">Current Profile Photo</label><br>
                    <img src="{{ Storage::url($user->photo) }}" alt="Current Profile Photo" class="img-fluid mt-2" style="max-width: 200px;">
                </div>
                @endif

                <!-- Input for New Profile Photo -->
                <div class="form-group">
                    <label for="photo">Upload New Profile Photo</label>
                    <input type="file" class="form-control-file mb-2" id="photo" name="photo">
                </div>

                <!-- You can add more fields here as needed -->

                <button type="submit" class="btn btn-primary">Update User</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>

@endsection
