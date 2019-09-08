@extends('layouts.admin')

@section('page-title', 'Export Album PDF')
@section('module', 'Export Album PDF')

@section('content')
<div class="row">
    <div class="col-lg-12">

        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0">Export Album PDF</h5>
            </div>
            <div class="card-body">
            <form target="_blank" method="post" action="{{ route('admin.album.exportsave') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Select Albums</label>
                        <select class="form-control select2" name="albums[]" id="albums" multiple>
                            @foreach($albums as $album)
                        <option value="{{ $album->pin }}">{{ $album->remark }} - {{ $album->mobile }}  {{ $album->studio ? '('.$album->studio->name.')' : '' }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    </div>

                    <button type="submit" class="btn btn-primary">Export</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@push('scripts')
    <script>
        $(".select2").select2();
    </script>
@endpush
