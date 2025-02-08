<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Finder</title>

  <!-- Link to Bootstrap CSS via CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  
  
  <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">-->
  <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">-->
  <!--<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">-->
  <!--<link rel="stylesheet" href="{{ asset('external/css/aos.css') }}">-->
  
    <!--<link rel="stylesheet" href="{{ asset('external/fonts/icomoon/style.css') }}">-->

<!--    <link rel="stylesheet" href="{{ asset('external/css/bootstrap.min.css') }}">-->
<!--    <link rel="stylesheet" href="{{ asset('external/css/magnific-popup.css') }}">-->
<!--    <link rel="stylesheet" href="{{ asset('external/css/jquery-ui.css') }}">-->
<!--    <link rel="stylesheet" href="{{ asset('external/css/owl.carousel.min.css') }}">-->
<!--    <link rel="stylesheet" href="{{ asset('external/css/owl.theme.default.min.css') }}">-->
<!--    <link rel="stylesheet" href="{{ asset('external/css/bootstrap-datepicker.css') }}">-->
<!--    <link rel="stylesheet" href="{{ asset('external/css/animate.css') }}">-->
    
<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">-->

  <!-- Link to External Stylesheet -->
  <!--<link rel="stylesheet" href="styles.css">-->
  <link rel="stylesheet" href="{{ asset('external/css/home/style.css') }}">

  <!-- Link to Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

</head>
<body>

  <header class="header">
        <div class="logo">
            <a href="{{ request()->routeIs('index') ? 'active' : '' }}"><img src="{{ asset('backend/assets/images/logo.png') }}" alt="Logo"></a>
        </div>
        <button class="hamburger" onclick="toggleMenu()">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
        <nav class="nav">
            <ul>
                <li class="{{ request()->routeIs('index') ? 'active' : '' }}"><a href="{{ route('index') }}">@lang('home.home')</a></li>
                <li class="{{ request()->routeIs('alljobs') ? 'active' : '' }}"><a href="{{ route('alljobs') }}">@lang('message.job')</a></li>

                @if (!Auth::check())
                <li class="{{ request()->routeIs('/register') ? 'active' : '' }}"><a href="{{ route('register')}}">@lang('home.job_seeker')</a></li>
                <li class="{{ request()->routeIs('company.register') ? 'active' : '' }}"><a href="{{ route('company.register') }}">@lang('home.for_company')</a></li>
                @else
                <!--<li><a href="{{ route('home') }}">@lang('message.dashboard')</a></li>-->
                
                <li><a  href="{{ route('home') }}">
                    @if(Auth::user()->user_type === 'employer')
                        {{ Auth::user()->company->cname ?? "" }}
                    @else
                        {{Auth::user()->name ?? "" }}
                    @endif
                    <!--<i class="fas fa-user"></i>-->
                    <!--<div class="profile-picture">-->
                        @if (!empty(Auth::user()->profile->avatar))
                            <img src="{{ asset('uploads/avatar') }}/{{ Auth::user()->profile->avatar }}" alt="a" style="width: 30px;height: 30px;">
                        @else
                            <img src="https://i.pravatar.cc/150" alt="profile image" class="img-fluid rounded-circle" style="width: 30px;height: 30px;">
                        @endif
                    <!--</div>-->
                </a></li>
                    
                @endif


                @if (!Auth::check())

                    <li class="cta"><a href="{{ route('login') }}" class="btn">@lang('home.get_started')</a></li>
                @else
                    <li class="cta"><a href="{{ route('logout') }}" class="btn" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">@lang('message.logout') <i class="icon-sign-out"></i></a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endif
                <li class="nav-item dropdown" style="position: relative;">
                    <!-- Language Icon and Dropdown Toggle -->
                    <a
                      class="nav-link d-flex align-items-center"
                      href="javascript:void(0)"
                      id="languageDropdown"
                      onclick="toggleLanguageMenu()">
                      <i class="bi bi-globe fs-5 me-2"></i>
                    </a>

                    <!-- Custom Dropdown Menu -->
                    <ul class="language-dropdown-menu" style="display: none; position: absolute; top: 100%; left: 0; background: white; border: 1px solid #ddd; border-radius: 4px; min-width: 150px; z-index: 1000; padding: 0;">
                      <li>
                        <a class="dropdown-item" href="{{ route('changeLanguage', 'en') }}" style="padding: 10px 15px; display: block; text-decoration: none; color: #333;">
                          <i class="bi bi-flag me-2"></i> English
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="{{ route('changeLanguage', 'ar') }}" style="padding: 10px 15px; display: block; text-decoration: none; color: #333;">
                          <i class="bi bi-flag-fill me-2"></i> العربية
                        </a>
                      </li>
                    </ul>
                  </li>

            </ul>
        </nav>
    </header>
