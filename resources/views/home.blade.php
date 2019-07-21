@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-lg-12">

    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="m-0">Welcome {{ auth()->user()->name }}</h5>
      </div>
      <div class="card-body">
        <h6 class="card-title">Welcome To Your Studio.</h6>
      </div>
    </div>
  </div>
</div>
@stop