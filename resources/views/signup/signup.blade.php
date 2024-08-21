@extends('layout.default')

@section('content')
    <div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mb-4 mx-4">
                        <form action="signup" method="post"
                            class="needs-validation @if ($errors->any()) was-validated @endif" novalidate>
                            @csrf
                            <div class="card-body p-4">
                                <h1>Register</h1>
                                <p class="text-body-secondary">Create your account</p>
                                <div class="input-group mb-3"><span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="assets/sprites/free.svg#cil-user"></use>
                                        </svg>
                                    </span>
                                    <input class="form-control" name="name" type="text" placeholder="Username">
                                </div>
                                <div class="input-group mb-3"><span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="assets/sprites/free.svg#cil-envelope-open">
                                            </use>
                                        </svg>
                                    </span>
                                    <input class="form-control" name="email" type="text" placeholder="Email">
                                </div>
                                <div class="input-group mb-3"><span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="assets/sprites/free.svg#cil-lock-locked"></use>
                                        </svg>
                                    </span>
                                    <input class="form-control" name="password" type="password" placeholder="Password">
                                </div>
                                <div class="input-group mb-4"><span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="assets/sprites/free.svg#cil-lock-locked"></use>
                                        </svg>
                                    </span>
                                    <input class="form-control" name="confirm_password" type="password"
                                        placeholder="Repeat password">
                                </div>
                                <button class="btn btn-block bg-primary text-light" type="submit">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
