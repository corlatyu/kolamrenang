@extends('layout.masterauth')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-3">

            <h2>Sign In</h2>
            <p>Enter your email and password to login</p>

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

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <div class="form-check form-check-primary form-check-inline">
                        <input class="form-check-input me-3" type="checkbox" id="form-check-default" name="remember">
                        <label class="form-check-label" for="form-check-default">
                            Remember me
                        </label>
                    </div>
                </div>

                <div class="mb-4">
                    <button type="submit" class="btn btn-secondary w-100">SIGN IN</button>
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
                <p class="mb-0">Don't have an account? <a href="{{ route('register') }}" class="text-warning">Sign Up</a></p>
            </div>
        </div>

    </div>
@endsection
