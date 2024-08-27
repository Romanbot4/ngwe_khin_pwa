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

@section('overlay')
    @include('account_providers.delete_account_provider_modal')
    @include('account_providers.edit_account_provider_modal')
@endsection

@section('content')
    <div class="table-responsive">
        <table class="table border mb-0" id="account-provider">
            <thead class="fw-semibold text-nowrap">
                <tr class="align-middle">
                    <th class="bg-body-secondary">#ID</th>
                    <th class="bg-body-secondary">Image</th>
                    <th class="bg-body-secondary">Name</th>
                    <th class="bg-body-secondary"></th>
                </tr>
            </thead>
        </table>
    </div>
    <script>
        let table = $('#account-provider').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/account-provider-table') }}",
            columns: [{
                    data: 'id'
                },
                {
                    data: 'image'
                },
                {
                    data: 'name'
                },
                {
                    data: 'actions',
                    orderable: false
                }
            ]
        });

        function removeRowFromUI(id) {
            var row = table.row('[data-row-id="' + id + '"]');
            row.remove().draw(false);
        }

        function updateRowFromUI(id) {
            var row = table.row('[data-row-id="' + id + '"]');
            row.draw();
        }
    </script>
@endsection
