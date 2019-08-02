<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>{{ $user->name }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ $user->avatar_url }}">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/themes/pixel/style.css') }}">

</head>

<body >
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area" >
        <!-- Navbar Area -->
        <div class="pixel-main-menu" id="sticker">
            <div class="classy-nav-container breakpoint-off">
                <div class="container-fluid">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="pixelNav">

                        <!-- Nav brand -->
                        <a href="{{ url()->current() }}" class="nav-brand">
                            <h1 style="color: white;">{{ $user->name }}</h1>
                        </a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="#section-home">Home</a></li>
									<li><a href="#section-portfolio">Portfolio</a></li>
                                    <li><a href="#section-services">Services</a></li>
                                    <li><a href="#section-team">Team</a></li>
                                    <li><a href="#section-contact">Contact</a></li>
                                </ul>
                            </div>
                          <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area" id="section-home">
        <div class="hero-slideshow owl-carousel">
            @if($user->banners)
                @foreach($user->banners as $banner)
                <!-- Single Slide -->
                <div class="single-slide">
                    <!-- Background Image-->
                    <div class="slide-bg-img bg-img" style="background-image: url({{ $banner->banner_url }});"></div>
                </div>
                @endforeach
            @endif
            
        </div>
    </section>

    <!-- ##### Portfolio Area Start ###### -->
    
    <div class="pixel-portfolio-area section-padding-100-0" id="section-portfolio">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                        <h2>Portfolio</h2>
                        <img src="{{ asset('assets/themes/pixel/img/core-img/x.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
		
		<div class="gallery_menu text-center">
            <div class="portfolio-menu">
                <button class="active btn" type="button" data-filter="*">All</button>
                @foreach($user->portfolios->unique('category') as $portfolio)
                    <button class="btn active" data-filter=".{{ str_replace(' ', '_', $portfolio->category) }}">{{ $portfolio->category }}</button>
                @endforeach
            </div>
        </div>
        <div class="pixel-portfolio portfolio-column">
            @foreach($user->portfolios as $portfolio)
                <!-- Single gallery Item -->
                <div class="single_gallery_item visual wow fadeInUp {{ str_replace(' ', '_', $portfolio->category) }}">
                    <img src="{{ $portfolio->portfolio_url }}" alt="">
                </div>
            @endforeach
            
        </div>
        
    </div>
    
    <!-- ##### Portfolio Area End ###### -->

    <!-- ##### Service Area Start ##### -->
   <section class="pixel-service-area section-padding-100-0" id="section-services">
			<div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Section Heading -->
                        <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                            <h2>Services</h2>
                            <img src="{{ asset('assets/themes/pixel/img/core-img/x.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
    <div class="container">
        <div class="row">
            @foreach($user->services as $service)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="single-service-area text-center mb-100 wow fadeInUp" data-wow-delay="200ms">
                    <img class="service-img" src="{{ $service->service_url }}" alt="">
                    <h5>{{ $service->name }}</h5>
                    <p class="text1">{{ $service->description }}</p>
                    <a href="#" class="btn btn_read">More Info</a>
                </div>
            </div>
            @endforeach

            
        </div>
    </div>
</section>
    <!-- ##### Service Area End ##### -->

    <!-- ##### Team Area Start ##### -->
    <section class="team-member-area section-padding-100-0" id="section-team">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>A Beautiful Team</h2>
                        <img class="mb-30" src="img/core-img/x.png" alt="">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum quis sem sed pharetra. Morbi tempus lobortis nunc non commodo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($user->teams as $member)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-team-member mb-100">
                        <img src="{{ $member->team_avatar }}" alt="">
                        <!-- Hover Text -->
                        <div class="hover-text d-flex align-items-end justify-content-center text-center">
                            <div class="hover--">
                                <h4>{{ $member->name }}</h4>
                                <h6>{{ $member->position }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ##### Team Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area section-padding-100-0" >
        <div class="container-fluid">
            <div class="row justify-content-between">

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="single-footer-widget mb-100">
                        <!-- Footer Logo -->
                        <a href="{{ url()->current() }}" class="footer-logo"><h1 style="color: white">{{ $user->name }}</h1></a>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-md-9 col-lg-8 col-xl-7" id="section-contact">
                    <div class="row">
                        <!-- Single Footer Widget -->
                        <div class="col-sm-4">
                            <div class="single-footer-widget mb-100">
                                <h5 class="widget-title">Address</h5>
                                <p>{{ $user->address }}</p>
                            </div>
                        </div>

                        <!-- Single Footer Widget -->
                        <div class="col-sm-4">
                            <div class="single-footer-widget mb-100">
                                <h5 class="widget-title">Support</h5>
                                <p><i class="fa fa-phone"></i> {{ $user->mobile }}</p>
                            </div>
                        </div>

                        <!-- Single Footer Widget -->
                        <div class="col-sm-4">
                            <div class="single-footer-widget mb-100">
                                <h5 class="widget-title">Social</h5>
                                <div class="footer-social-info">
                                    <a href="{{ $user->facebook_url }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="{{ $user->instagram_url }}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="{{ $user->pinrest_url }}" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="{{ asset('assets/themes/pixel/js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('assets/themes/pixel/js/bootstrap/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('assets/themes/pixel/js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- All Plugins js -->
    <script src="{{ asset('assets/themes/pixel/js/plugins/plugins.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('assets/themes/pixel/js/active.js') }}"></script>
</body>

</html>