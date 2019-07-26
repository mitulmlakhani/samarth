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
    <link rel="stylesheet" href="{{ asset('assets/themes/hope/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/themes/hope/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/themes/hope/css/default-assets/classy-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/themes/hope/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/themes/hope/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/themes/hope/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/themes/hope/css/default-assets/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/themes/hope/css/style.css') }}">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->

    <!-- Header Area Start -->
    <header class="header-area">
        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="alimeNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="{{ url('studio/'.$user->mobile) }}"><img src="{{ $user->avatar_url }}" alt="{{ $user->name }}"  height="80" width="80"></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Menu Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                    <li class="active"><a href="#Home">Home</a></li>
                                    <li><a href="#Section_Services">Service</a></li>
                                    <li><a href="#Section_Portfolio">Portfolio</a></li>
                                    <li><a href="#Section_Our Team">Our Team</a></li>
                                    <li><a href="#Section_Contact_Us">Contact_Us</a></li>

                                </ul>

                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    <!-- Welcome Area Start -->
    <section class="welcome-area">
        <div class="welcome-slides owl-carousel">
            @if($user->banners)
                @foreach($user->banners as $banner)
                <!-- Single Slide -->
                <div class="single-welcome-slide bg-img bg-overlay" style="background-image: url({{ $banner->banner_url }});">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <!-- Welcome Text -->
                            <div class="col-12 col-lg-8 col-xl-6">
                                <div class="welcome-text">
                                    <h2 data-animation="bounceInDown" data-delay="900ms">Hello <br>{{ $user->name }}</h2>
                                    <div class="hero-btn-group" data-animation="bounceInDown" data-delay="100ms">
                                        <a href="#Section_Contact_Us" class="btn alime-btn mb-3 mb-sm-0 mr-4">Get a
                                            Quote</a>
                                        <a class="hero-mail-contact" href="#">{{ $user->email }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif

        </div>
    </section>
    <!-- Welcome Area End -->

    <!-- Why Choose Us Area Start -->
    <section class="why-choose-us-area bg-gray section-padding-80-0 clearfix" id="Section_Services">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                        <h2>Services</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($user->services as $service)
                <div class="col-md-6 col-lg-4">
                    <div class="why-choose-us-content text-center mb-80 wow fadeInUp" data-wow-delay="100ms">
                        <div class="chosse-us-icon">
                            <i class="fa fa-film" aria-hidden="true"></i>
                        </div>
                        <h4>{{ $service->name }}</h4>
                        <p>{{ $service->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Why Choose  us Area End -->

    <!-- Portfolio Area Start -->

    <div class="alime-portfolio-area section-padding-80 clearfix" id="Section_Portfolio">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                        <h2>Portfolio</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Projects Menu -->
                    <div class="alime-projects-menu">
                        <div class="portfolio-menu text-center">
                            <button class="btn active" data-filter="*">All</button>
                            @foreach($user->portfolios->unique('category') as $portfolio)
                                <button class="btn active" data-filter=".{{ str_replace(' ', '_', $portfolio->category) }}">{{ $portfolio->category }}</button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="row alime-portfolio">

                @foreach($user->portfolios as $portfolio)
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item {{ str_replace(' ', '_', $portfolio->category) }} mb-30 wow fadeInUp"
                    data-wow-delay="300ms">
                    <div class="single-portfolio-content">
                        <img src="{{ $portfolio->portfolio_url }}" alt="">
                        <div class="hover-content">
                            <a href="{{ $portfolio->portfolio_url }}" class="portfolio-img">+</a>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
    <!-- Portfolio Area End -->


    <!-- Our Team Area Start -->
    <section class="our-team-area section-padding-80-50" id="Section_Our Team">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                        <h2>Our Team</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Team Member Area -->
                @foreach($user->teams as $member)
                <div class="col-md-6 col-xl-3">
                    <div class="team-content-area text-center mb-30 wow fadeInUp" data-wow-delay="100ms">
                        <div class="member-thumb">
                            <img src="{{ $member->team_avatar }}" alt="">
                        </div>
                        <h5>{{ $member->name }}</h5>
                        <span>{{ $member->position }}</span>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Our Team Area End -->

    <!-- Contact Area Start -->
    <div class="contact-area section-padding-80-50" id="Section_Contact_Us">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                        <h2>Contect Us</h2>
                    </div>

                </div>
                <div class="col-12 col-lg-6">
                    <h2 class="contact-title mb-30">Let’s Work <br>Together</h2>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <!-- Contact Info -->
                    <div class="contact-info mb-30">
                        <p>Email</p>
                        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                    </div>
                    <!-- Contact Info -->
                    <div class="contact-info mb-30">
                        <p>Call Us</p>
                        <a href="#">{{ $user->mobile }}</a>
                    </div>

                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <!-- Contact Info -->
                    <div class="contact-info mb-30">
                        <p>Visit Us</p>
                        <a href="#">{{ $user->address }}</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Contact Area End -->

    <!-- Map Area Start -->
    <div class="map-area section-padding-0-80">
        <div class="container">
            <div id="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12309.440717226664!2d24.094896788114085!3d56.9484200464499!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46eecfb0e5073ded%3A0x400cfcd68f2fe30!2sRiga%2C+Latvia!5e0!3m2!1sen!2sbd!4v1550835159592"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <!-- Map Area End -->

    <!-- Footer Area Start -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-content d-flex align-items-center justify-content-between">
                        <!-- Copywrite Text -->
                        <div class="copywrite-text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>document.write(new Date().getFullYear());</script> All rights reserved | This
                                template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#"
                                    target="_blank">HOPE Enterprises</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <!-- Footer Logo -->
                        <div class="footer-logo">
                            <a href="#"><img src="{{ $user->avatar_url }}" alt=""></a>
                        </div>
                        <!-- Social Info -->
                        <div class="social-info">
                            <a href="{{ $user->facebook_url }}" target="_blank"><i class="ti-facebook" aria-hidden="true"></i></a>
                            <a href="{{ $user->instagram_url }}" target="_blank"><i class="ti-instagram" aria-hidden="true"></i></a>
                            <a href="{{ $user->pinrest_url }}" target="_blank"><i class="ti-pinterest" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->

    <!-- **** All JS Files ***** -->
    <!-- jQuery 2.2.4 -->
    <script src="{{ asset('assets/themes/hope/js/jquery.min.js') }}"></script>
    <!-- Popper -->
    <script src="{{ asset('assets/themes/hope/js/popper.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/themes/hope/js/bootstrap.min.js') }}"></script>
    <!-- All Plugins -->
    <script src="{{ asset('assets/themes/hope/js/alime.bundle.js') }}"></script>
    <!-- Active -->
    <script src="{{ asset('assets/themes/hope/js/default-assets/active.js') }}"></script>

</body>

</html>