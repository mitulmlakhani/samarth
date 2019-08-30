@extends('layouts.distributor')
@section('content')
<div class="row">
  <div class="col-lg-12">

    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="m-0">Welcome Admin</h5>
      </div>
      <div class="card-body">
        <div class="row">
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $total_studios }}</h3>
        
                <p>Total Studios</p>
              </div>
              <div class="icon">
                <i class="fa fa-video-camera"></i>
              </div>
              <a href="{{ route('distributor.studios') }}" class="small-box-footer">More info <i
                  class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $total_ambums }}</h3>
        
                <p>Total Albums</p>
              </div>
              <div class="icon">
                <i class="fa fa-book"></i>
              </div>
              <a href="{{ route('distributor.albums') }}" class="small-box-footer">More info <i
                  class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
@stop