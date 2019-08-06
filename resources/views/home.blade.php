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
              <a href="{{ route('studio.albums') }}" class="small-box-footer">More info <i
                  class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ (auth()->user()->album_credit-auth()->user()->album_created) }}</h3>

                <p>Total Albums Credit</p>
              </div>
              <div class="icon">
                <i class="fa fa-credit-card-alt"></i>
              </div>
              <a href="{{ route('studio.albums') }}" class="small-box-footer">More info <i
                  class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <div class="small-box bg-{{ auth()->user()->membershipValidity() < 0 ? 'danger' : (auth()->user()->membershipValidity() < date('t') ? 'warning' : 'info')  }}">
              <div class="inner">
                <h3></h3>
                <h3>{{ auth()->user()->membershipValidity() }}</h3>
                <p>Membership Validity (Days)</p>
              </div>
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <a href="{{ route('studio.albums') }}" class="small-box-footer">More info <i
                  class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="row">  
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $banners }}</h3>

                <p>Total Banners</p>
              </div>
              <div class="icon">
                <i class="fa fa-picture-o "></i>
              </div>
              <a href="{{ route('studio.banners') }}" class="small-box-footer">More info <i
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
              <a href="{{ route('studio.services') }}" class="small-box-footer">More info <i
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
              <a href="{{ route('studio.portfolios') }}" class="small-box-footer">More info <i
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
              <a href="{{ route('studio.team') }}" class="small-box-footer">More info <i
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