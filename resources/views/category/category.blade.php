@extends('layout.default')

@section('header')
    @include('header.default')
@endsection()

@section('sidebar')
    @include('sidebar.sidebar')
@endsection

@once
    @push('deps')
        <meta name="csrf_token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
    @endpush
@endonce

@once
    @push('scripts')
        <script>
            let table = $('#category-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('/category-table') }}",
                columns: [{
                        data: 'id'
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
    @endpush
@endonce

@section('overlay')
    @include('category.delete_category_modal')
    @include('category.edit_category_modal')
    @include('category.add_category_modal')
@endsection

@section('content')
    @include('category.category_tool_bar')
    <div class="table-responsive">
        <table class="table border mb-0" id="category-table">
            <thead class="fw-semibold text-nowrap">
                <tr class="align-middle">
                    <th class="bg-body-secondary">ID</th>
                    <th class="bg-body-secondary">Name</th>
                    <th class="bg-body-secondary col-1"></th>
                </tr>
            </thead>
        </table>
    </div>
@endsection()
