{{-- resources/views/admin/users/index.blade.php --}}
@extends('layouts.admin')

@push('styles')
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>IMG</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Role') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Data Registration') }}</th>
                        <th class="text-center" width="200px"><i class="bi bi-gear"></i></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
       
    </div>
</div>
@endsection

@push('javascripts')    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript">
        $.noConflict();

        jQuery( document ).ready(function( $ ) {
        
            var table = $('.data-table').DataTable({
                pageLength: 25,
                processing: true,
                serverSide: true,
                @if(app()->getLocale()!='en')
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/{!! app()->getLocale() !!}.json'
                },
                @endif
                ajax: "{{ route('users.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'image', name: 'image'},
                    {data: 'name', name: 'name'},
                    {data: 'role', name: 'role'},
                    {data: 'status', name: 'status'},
                    {data: 'created_at', name : 'created_at'},
                    {data: 'action', name : 'action'}
                ]
            });
        });
    </script>
@endpush
{{-- resources/views/admin/users/index.blade.php --}}