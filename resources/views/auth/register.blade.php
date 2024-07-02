@extends('layout.masterauth')

@section('content')
<div class="row">
    <div class="col-md-12 mb-3">

        <h2>Registrasi</h2>
        <p>Enter your name, email, password, and upload a profile photo to register</p>

        {{-- Menampilkan pesan error jika validasi gagal --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Profile Photo</label>
                <input type="file" name="photo" class="form-control-file">
            </div>

            <div class="mb-3">
                <div class="form-check form-check-primary form-check-inline">
                    <input class="form-check-input me-3" type="checkbox" id="form-check-default" name="agree_terms">
                    <label class="form-check-label" for="form-check-default">
                        I agree the <a href="javascript:void(0);" class="text-primary">Terms and Conditions</a>
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <button type="submit" class="btn btn-secondary w-100">SIGN UP</button>
            </div>
        </form>

    </div>

    <div class="col-12 mb-4">
        <div class="seperator">
            <hr>
            <div class="seperator-text"> <span>Or continue with</span></div>
        </div>
    </div>

    <div class="col-12">
        <div class="text-center">
            <p class="mb-0">Already have an account? <a href="{{ route('login') }}" class="text-warning">Sign in</a>
            </p>
        </div>
    </div>

</div>
@endsection
