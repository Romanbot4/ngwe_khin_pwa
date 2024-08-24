@extends('layout.default')

@section('content')
    <div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card-group d-block d-md-flex row">
                        <div class="card col-md-7 p-4 mb-0">
                            <form action="login" method="post"
                                class="needs-validation @if ($errors->any()) was-validated @endif" novalidate>
                                @csrf
                                <div class="card-body">
                                    <h1>Login</h1>
                                    <p class="text-body-secondary">Sign In to your account</p>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="assets/sprites/free.svg#cil-user"></use>
                                            </svg>
                                        </span>
                                        <input class="form-control" name="email" type="text" placeholder="Email..."
                                            required @error('email') is-invalid @enderror minlength="5">
                                        <span class="invalid-feedback">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="input-group mb-4">
                                        <span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="assets/sprites/free.svg#cil-lock-locked">
                                                </use>
                                            </svg>
                                        </span>
                                        <input class="form-control" name="password" type="password" placeholder="Password..."
                                            required minlength="8">
                                        <span class="invalid-feedback"> @error('password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-primary px-4" type="submit">Login</button>
                                        </div>
                                        <div class="col-6 text-end">
                                            <button class="btn btn-link px-0" type="button">Forgot password?</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card col-md-5 text-white bg-primary py-5">
                            <div class="card-body text-center">
                                <div>
                                    <h2>Sign up</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                    <button class="btn btn-lg btn-outline-light mt-3" type="button" onclick="window.location.href='{{route('signup')}}'">Register Now!</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
