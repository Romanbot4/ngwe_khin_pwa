@extends('components.image_picker', [
    'className' => 'ratio ratio-16x9',
])

@section('body')
    <div class="ratio ratio-16x9 position-absolute top-0 end-0 bg-body-secondary rounded-2">
        <div class="d-flex align-items-center justify-content-center">
            <i class="bi-plus-lg bg-subtle" style="font-size: 4rem;"></i>
        </div>
    </div>
    <img class="ratio ratio-16x9 object-fit-cover rounded-2" src="{{ $image ?? '' }}" alt="{{$title ?? ""}}">
    <div>
        <div class="position-absolute bottom-0 end-0 p-2">
            @include('components.circular_icon', ['icon' => url('assets/sprites/free.svg#cil-camera')])
        </div>
    </div>
@endsection
