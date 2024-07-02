@extends('layout.masteruser')

@section('content')

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary mb-2 mb-md-0">Edit Profile</h6>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('user.updateProfile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required>
                </div>
                <div class="form-group">
                    <label for="password">Password (leave blank to keep current password)</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
                <div class="form-group">
                    <label for="photo">Upload New Profile Photo</label>
                    <input type="file" class="form-control-file" id="photo" name="photo">
                </div>
                <button type="submit" class="btn btn-primary">Update Profile</button>
                <a href="{{ route('user.profile') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
@endsection
