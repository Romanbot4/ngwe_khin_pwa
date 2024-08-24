@extends('layout.default')

@section('header')
    @include('header.default')
@endsection

@section('sidebar')
    @include('sidebar.sidebar')
@endsection


@section('content')
    <div class="bg-body-tertiary d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-md-6">
                    <form action="{{url('profile-update/'.$id)}}" method="post" enctype="multipart/form-data"
                        class="pt-2 needs-validation was-validated" novalidate>
                        @csrf
                        @include('components.profile_image_picker', [
                            'id' => 'profileImage',
                            'fieldName' => 'image',
                        ])
                        <div class="fs-4 fw-bold pt-2">{{ $name }}</div>
                        <div class="pt-2 text-muted">
                            <span>#{{ $id }}</span>
                            <span class="dot-before">Registered at
                                {{ date_format(date_create($created_at), 'M d, Y') }}</span>
                            <div class="pt-1">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required
                                    minlength="3" placeholder="Enter name..." value="{{ $name }}">
                                <span class="invalid-feedback d-block">fff</span>
                            </div>
                            <div class="pt-1">
                                <label for="name">Email</label>
                                <input type="text" name="email" disabled class="form-control"
                                    value="{{ $email }}">
                                <span class="invalid-feedback d-block">&nbsp;</span>
                            </div>
                            <div class="pt-4">
                                @include('components.primary_button', [
                                    'label' => 'Save Changes',
                                    'type' => 'submit',
                                ])
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
