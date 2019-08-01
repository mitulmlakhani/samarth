@extends('layouts.app')
@section('page-title', 'Dashboard')
@section('content')
<div class="row">
  <div class="col-lg-12">

    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="m-0">Welcome <b>{{ auth()->user()->name }}</b></h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $albums }}</h3>

                <p>Total Albums</p>
              </div>
              <div class="icon">
                <i class="fa fa-book"></i>
              </div>
              <a href="{{ route('admin.studios') }}" class="small-box-footer">More info <i
                  class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $banners }}</h3>

                <p>Total Banners</p>
              </div>
              <div class="icon">
                <i class="fa fa-picture-o "></i>
              </div>
              <a href="{{ route('admin.studios') }}" class="small-box-footer">More info <i
                  class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $services }}</h3>

                <p>Total Services</p>
              </div>
              <div class="icon">
                <i class="fa fa-handshake-o"></i>
              </div>
              <a href="{{ route('admin.studios') }}" class="small-box-footer">More info <i
                  class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $portfolio }}</h3>

                <p>Total Portfolio</p>
              </div>
              <div class="icon">
                <i class="fa fa-briefcase"></i>
              </div>
              <a href="{{ route('admin.studios') }}" class="small-box-footer">More info <i
                  class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $team }}</h3>

                <p>Total Team Members</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="{{ route('admin.studios') }}" class="small-box-footer">More info <i
                  class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        </div>
      </div>
    </div>
  </div>
</div>
@stop