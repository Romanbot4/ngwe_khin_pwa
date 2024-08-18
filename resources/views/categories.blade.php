@extends('layout.default')


@section('header')
    @include('header.default')
@endsection()

@section('footer')
    @include('footer.default')
@endsection()

@section('deps')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
@endsection

@section('content')
    <table id="category-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
        </thead>
    </table>
    <script>
        $('#category-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{url("/category")}}",
            columns: [
                { data: 'id' },
                { data: 'name' },
            ]
        });
    </script>
@endsection()
