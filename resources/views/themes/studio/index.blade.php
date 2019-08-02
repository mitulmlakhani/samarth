<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> 
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>{{ $user->name }}</title>
    <!-- Favicon  -->
    <link rel="icon" href="{{ $user->avatar_url }}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/themes/studio/css/core-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/themes/studio/style.css') }}">

    <!-- Responsive CSS -->
    <link href="{{ asset('assets/themes/studio/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/themes/studio/css/grid.css') }}" rel="stylesheet">
      
   
	
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="showbox">
            <div class="loader">
                <svg class="circular"   box="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
                </svg>
            </div>
        </div>
        
    </div>

    <!-- Gradient Background Overlay -->
    <div class="gradient-background-overlay"></div>

    <!-- Header Area Start -->
    <header class="header-area">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 h-100">
                    <div class="main-menu h-100">
                        <nav class="navbar h-100 navbar-expand-lg">
                            <!-- Logo Area  -->
                            <a class="navbar-brand" href="{{ url()->current() }}"><img src="{{ $user->avatar_url }}" alt="{{ $user->name }}" style="width:146px; height:37px;"></a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#studioMenu" aria-controls="studioMenu" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i> Menu</button>

                            <div class="collapse navbar-collapse" id="studioMenu">
                                <!-- Menu Area Start  -->
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ url()->current() }}">Home <span class="sr-only">(current)</span></a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" href="#section_services">Services</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#section_portfolio">Portfolio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#section_team">My Team</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#section_contact">contact</a>
                                    </li>
                                </ul>
                                
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    
    
    <!-- ***** Welcome Area Start ***** -->
    <section class="welcome-area">
        <div class="carousel h-100 slide" data-ride="carousel" id="welcomeSlider">
            <!-- Carousel Inner -->
            <div class="carousel-inner h-100">
                @if($user->banners)
                    @foreach($user->banners as $banner)
                    <div class="carousel-item h-100 bg-img active" style="background-image: url({{ $banner->banner_url }});">
                        <div class="carousel-content h-100">
                            <div class="slide-text">
                                <span>Hello</span>
                                <h2> {{ $user->name }}</h2>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif

        </div>
    </section>
    <!-- ***** Welcome Area End ***** -->
	
	<!-- Services Area Srart -->
	<section class="why-choose-us-area bg-gray section_padding_50 clearfix " id="section_services">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about-content  mb-100 text-center">
                        <span></span>
                        <h2>Services</h2>
                       
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($user->services as $service)
                <div class="col-md-6 col-lg-4">
                    <div class="why-choose-us-content text-center mb-80 wow fadeInUp" data-wow-delay="100ms">
                        <div class=" service-thumb">
                            <img src="{{ $service->service_url }}" alt="">
                        </div>
                        <h4>{{ $service->name }}</h4>
                        <div class="wrapper">
							<p class="text1">{{ $service->description }}</p>
							<p class="btn_read">read more</p>
						</div>

                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Why Choose  us Area End -->
	
	<!--portfolio area start -->
	<section class="section_padding_50 " id="section_portfolio">
		<div class="container">
			<div class="col-12 ">
                <div class="about-content mb-50 text-center">
                   <span></span>
                      <h2>Portfolio</h2>
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

			<div class="row portfolio-column">
			
               @foreach($user->portfolios as $portfolio)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 column_single_gallery_item {{ str_replace(' ', '_', $portfolio->category) }}">
                    <img src="{{ $portfolio->portfolio_url }}" alt="">
                    <div class="hover_overlay">
                        <a class="gallery_img" href="{{ $portfolio->portfolio_url }}"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
                @endforeach

		    </div>
	
	</section>
	
	<!--portfolio area End -->

    <!-- team Area End -->
	<section class="container about-me-area  section_padding_50 " id="section_team">
		<div class="row justify-content-center ">
		
			<div class="col-10">
                <div class="about-content  mb-50 text-center">
                    <span></span>
                    <h2>My Team</h2>
                    
                </div>
            </div>
            @foreach($user->teams as $member)
            <div class="col-4 mb-50">
                <img src="{{ $member->team_avatar }}" alt="Avatar" class="image" style="width:100%">
                <div class="middle">
                    <div class="text">{{ $member->name }}</div>
                </div>
            </div>
            @endforeach

		</div>
		
   </section>

    <!-- contect Area End -->
	<section class="contact-area section_padding_50 " id="section_contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="contact-heading-text text-center mb-100">
                        <span></span>
                        <h2>Contact Us</h2>
                    </div>
                </div>
               
            </div>
        </div>
    </section>

    <!-- Google Maps -->
    <div class="map-area ">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-10">
					
                    <div>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d238133.1523864997!2d72.6822065222553!3d21.159142499075124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e59411d1563%3A0xfe4558290938b042!2sSurat%2C+Gujarat!5e0!3m2!1sen!2sin!4v1563177166928!5m2!1sen!2sin" width="100%" height="420" frameborder="0" style="border:0" allowfullscreen></iframe>	
						
					</div>
                    <!-- Contact Info -->
                    <div class="contact-core-info d-flex align-items-center wow fadeInLeftBig" data-wow-delay="0.5s" data-wow-duration="1000ms">
                        <div class="contactInfo">
                            <img src="{{ $user->avatar_url }}" alt="">
                            <!-- Single Footer Content -->
                            <div class="single-footer-content">
                                <img src="{{ asset('assets/themes/studio/img/core-img/map.png') }}" alt="">
                                <a href="#">{{ $user->address }}</a>
                            </div>
                            <!-- Single Footer Content -->
                            <div class="single-footer-content">
                                <img src="{{ asset('assets/themes/studio/img/core-img/smartphone.png') }}" alt="">
                                <a href="#">{{ $user->mobile }}</a>
                            </div>
                            <!-- Single Footer Content -->
                            <div class="single-footer-content">
                                <img src="{{ asset('assets/themes/studio/img/core-img/envelope-2.png') }}" alt="">
                                <a href="#">{{ $user->mobile }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	
	<!-- Footer Area Start -->
    <footer class="footer-area">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-12 ">
                    <div class="footer-content h-100 d-md-flex align-items-center justify-content-between">
                        <!-- Single Footer Content -->
                        <div class="single-footer-content">
                            <img src="{{ asset('assets/themes/studio/img/core-img/map.png') }}" alt="">
                            <a href="#">{{ $user->address }}</a>
                        </div>
                        <!-- Single Footer Content -->
                        <div class="single-footer-content">
                            <img src="{{ asset('assets/themes/studio/img/core-img/smartphone.png') }}" alt="">
                            <a href="#">{{ $user->mobile }}</a>
                        </div>
                        <!-- Single Footer Content -->
                        <div class="single-footer-content">
                            <img src="{{ asset('assets/themes/studio/img/core-img/envelope-2.png') }}" alt="">
                            <a href="#">{{ $user->email }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->

    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
<p class="text-center">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved<i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">hope</a></p>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="{{ asset('assets/themes/studio/js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('assets/themes/studio/js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('assets/themes/studio/js/bootstrap.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('assets/themes/studio/js/plugins.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('assets/themes/studio/js/active.js') }}"></script>

</body>

</html>