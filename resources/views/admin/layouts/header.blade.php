<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Mombasa IT Company Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/images/favicon.png') }}">
    <link href="{{ asset('/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('/vendor/chartist/css/chartist.min.css') }}">
    <link href="{{ asset('/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('/icons/flaticon/flaticon.css') }}" rel="stylesheet">

	<!--added css -->
	<link href="{{ asset('/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
	<!--datepicker-->
    <link rel="stylesheet" href="{{ asset('/css/jquery-ui.css') }}">

	<link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/toastr.min.css') }}" />


</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{ url('/') }}" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('/images/logo.png') }}" alt="">
                <img class="logo-compact" src="{{ asset('/images/logo-text2.png') }}" alt="">
                <img class="brand-title" src="{{ asset('/images/logo-text2.png') }}" alt="">
            </a>

            <div class="nav-control">
                <div class="fburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                Dashboard
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link dz-fullscreen" href="#">
                                    <svg id="icon-full" viewBox="0 0 24 24" width="26" height="26" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg>
                                    <svg id="icon-minimize" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize"><path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3"></path></svg>
                                </a>
							</li>
							
                           
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
									<div class="header-info">
										<span >{{auth()->user()->name}}</span>
										<small>{{ucfirst(auth()->user()->role->name)}} </small>
									</div>
                                    <img src="{{asset('images')}}/{{auth()->user()->image}}" width="20" alt=""/>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
									<a href="{{ url('/') }}" class="dropdown-item ai-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 7.093v-0v 3zm4 5.907l-12-12-12 12h3v10h18v-10h3zm-5 "/></svg>
										<span class="ml-2 font4">Home </span>
                                    </a>
								
								@if (auth()->check() && auth()->user()->role->name === 'admin')
									<a href="{{ route('admin.profile') }}" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2 font4">Profile </span>
                                    </a>
									
								@else
                                    <a href="{{ route('staff.profile') }}" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2 font4">Profile </span>
                                    </a>
								@endif
                                    <a href="{{route('logout')}}" class="dropdown-item ai-icon"
									     onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2 font4">{{ __('Logout') }}</span>
                                    </a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <style>
                                    .dropdown-menu .dropdown-item:hover{
                                        background-color: #ae1ce2;
                                        color: #ffffff !important;
                                    }
                                     /* SHADE DAYS IN THE PAST */
                                        td.fc-day.fc-past {
                                            background-color: #fff0ff !important;
                                    }
                                    </style>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->