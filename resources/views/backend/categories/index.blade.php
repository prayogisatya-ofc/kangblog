@extends('layouts.app')

@section('title', 'Categories')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-card icon="list" title="Categories">
                <div class="table-responsive">
                    <table class="table table-striped w-100" id="yajra">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </x-card>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="{{ asset('backend/library/jquery/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function() {
            categoryTable();
        });

        function categoryTable() {
            new DataTable('#yajra', {
                ajax: "{{ route('admin.categories.serverside') }}",
                processing: true,
                serverSide: true,
                responsive: true, 
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'slug', name: 'slug'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        }
    </script>
@endpush