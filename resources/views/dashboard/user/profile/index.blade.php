@extends('layout.masteruser')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary mb-2 mb-md-0">User Profile</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-3 text-center mb-3 mb-md-0">
                    <!-- Profile Photo -->
                    @if($user->photo)
                    <img src="{{ Storage::url($user->photo) }}" alt="Profile Photo" class="img-thumbnail rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                    @else
                    <div class="bg-secondary text-white rounded-circle d-flex justify-content-center align-items-center" style="width: 150px; height: 150px;">
                        <span class="text-center">No Photo</span>
                    </div>
                    @endif
                </div>
                <div class="col-md-9">
                    <!-- User Details -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" value="{{ $user->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" value="{{ $user->email }}" readonly>
                    </div>
                    <a href="{{ route('user.edit.profile', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
