@extends('components.image_picker', [
    'className' => 'rounded-circle shadow-sm size-8'
])
@section('body')
    <img class="w-100 h-100 object-fit-cover rounded-circle" src="{{ $image ?? asset('assets/sprites/profile_default.svg') }}" alt="">
    <div class="position-absolute bottom-0 end-0">@include('components.circular_icon', ['icon' => url('assets/sprites/free.svg#cil-camera')])</div>
@endsection
