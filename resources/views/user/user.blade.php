@extends('layout.default')

@section('header')
    @include('header.default')
@endsection


@section('sidebar')
    @include('sidebar.sidebar')
@endsection

@once
    @push('deps')
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
    @endpush
@endonce

@section('content')
    <div class="table-responsive">
        <table class="table border mb-0" id="user-table">
            <thead class="fw-semibold text-nowrap">
                <tr class="align-middle">
                    <th class="bg-body-secondary">#ID</th>
                    <th class="bg-body-secondary">User</th>
                    <th class="bg-body-secondary"></th>
                </tr>
            </thead>
        </table>
    </div>
    <script>
        $('#user-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/user-table') }}",
            columns: [{
                    data: 'id'
                },
                {
                    data: 'user'
                },
                {
                    data: 'actions',
                    orderable: false
                }
            ]
        });
    </script>
@endsection

{{-- @push('scripts')
@endpush --}}
