@extends('components.icon_button', [
    "label" => "Create",
    "attributes" => "data-bs-toggle=modal data-bs-target=#addCategoryFormModal"
])
@section('icon')
    <i class="bi bi-plus-lg"></i>
@endsection
