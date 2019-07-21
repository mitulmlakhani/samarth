@extends('layouts.admin')

@section('page-title', 'Albums List')
@section('module', 'Albums')

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/datatables.min.css" />
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success ! {{ session('success') }}</strong> .
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0">Albums</h5>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-md-12">
                    <select name="album" id="album_studio_filter" class="select2 form-control" style="width:50%;" placeholder="Select Studio">
                        <option value="">Select Studio</option>
                        @foreach($studios as $studio)
                            <option value="{{ $studio->id }}">{{ $studio->name }} ({{ $studio->mobile }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
    

                {!! $dataTable->table() !!}
            </div>
        </div>
    </div>
</div>
@stop

@push('scripts')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/datatables.min.js"></script>
{!! $dataTable->scripts() !!}
<script>
    $(document).ready(function() {
        $('#album_studio_filter').select2();
        $('#album_studio_filter').on('change', function () {
            $('#dataTableBuilder').DataTable().ajax.reload();
        });
        $('#dataTableBuilder').on('preXhr.dt', function ( e, settings, data ) {
            data.studioId = $('#album_studio_filter').val();
        });

    });
</script>
@endpush