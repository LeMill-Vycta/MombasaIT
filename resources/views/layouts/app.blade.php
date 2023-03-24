<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mombasa IT Company') }}</title>

    <!-- Fonts -->

    <link href="{{ asset('/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('/vendor/chartist/css/chartist.min.css') }}">

    <!-- Styles -->
    <link href="{{asset ('/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aboutstyle.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/toastr.min.css') }}" />



    <link href="{{ asset('/icons/flaticon/flaticon.css') }}" rel="stylesheet">
	<link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet">

  



    <!--datepicker-->
    <link rel="stylesheet" href="{{ asset('/css/jquery-ui.css') }}">

    <link rel="icon" href="{{ url('/images/favicon.ico') }}" type="image/x-icon"/>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="brand-logo" href="{{ url('/') }}">
                    <img class="logo-abbr" src="{{ asset('/images/logo2.png') }}" alt="">
                <img class="logo-compact" src="{{ asset('/images/logo-text2.png') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto header-right">
                            <li class="nav-item">
                                    <a class="btn btn-xs tp-btn-light btn-secondary {{ (request()->is('/')) ? 'active' : ''}}" href="{{ url('/') }}"><span class="font">Home</span></a>
                            </li>
                            <li class="nav-item">
                                    <a class="btn btn-xs tp-btn-light btn-secondary {{ (request()->is('services')) ? 'active' : ''}}" href="{{ url('/services') }}"><span class="font">Our Services</span></a>
                            </li>
                            <li class="nav-item">
                                    <a class="btn btn-xs tp-btn-light btn-secondary {{ (request()->is('our-staff')) ? 'active' : ''}}" href="{{ url('/our-staff') }}"><span class="font">Our Staff</span></a>
                            </li>
                            <li class="nav-item">
                                    <a class="btn btn-xs tp-btn-light btn-secondary {{  (request()->is('aboutus')) ? 'active' : ''}}" href="{{ url('/aboutus') }}"><span class="font">About Us</span></a>
                            </li>
                            <li class="nav-item">
                                    <a class="btn btn-xs tp-btn-light btn-secondary {{  (request()->is('contactus')) ? 'active' : ''}}" href="{{ url('/contactus') }}"><span class="font">Contact Us</span></a>
                            </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="btn btn-xs btn-danger font" href="{{ route('login') }}"><span style="font-size:17px; font-weight:500;">Login<span></a>
                                </li>
                                &nbsp;&nbsp;
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-xs btn-info font" href="{{ route('register') }}"><span style="font-size:17px; font-weight:500;">Register</span></a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
									<div class="header-info">
										<span>{{auth()->user()->name}}</span>
										<small>{{auth()->user()->role->name}} </small>
									</div>
                                    <img src="{{asset('images')}}/{{auth()->user()->image}}" width="20" alt=""/>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right"> 
                                @if(auth()->check() && auth()->user()->role->name === 'client')
                                    <p style="color:#e0333b; font-size:16px; margin-left: 15px;">Client Menu: <p>
                                    <a class="dropdown-item {{  (request()->is('contactus')) ? 'my-appointments' : ''}}"  href="{{ route('my.appointment') }}"><span class="font4a">My Appointments</span></a>
                                    <a class="dropdown-item {{  (request()->is('contactus')) ? 'client-profile' : ''}}"  href="{{ route('client.profile') }}"><span class="font4a">My Profile</span></a>
                                    <a class="dropdown-item {{  (request()->is('contactus')) ? 'my-appointments/progress*' : ''}}"  href="{{ route('clientprogress.index') }}"><span class="font4a">My Progress Reports</span></a>
                                    <a class="dropdown-item {{  (request()->is('contactus')) ? 'my-appointments/progress*' : ''}}"  href="{{ route('invoices.index') }}"><span class="font4a">My Invoices</span></a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <span class="font4a">Logout</span></a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                  </form>
                                @endif   
                                @if(auth()->check() && auth()->user()->role->name === 'staff')
                                    <p style="color:#e0333b; font-size:16px; margin-left: 15px;">Staff Menu: <p>
                                    <a class="dropdown-item"  href="{{ url('/dashboard') }}"><span class="font4a">Dashboard</span></a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <span class="font4a">Logout</span></a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                  </form>
                                @endif  

                                @if(auth()->check() && auth()->user()->role->name === 'admin')
                                    <p style="color:#e0333b; font-size:16px; margin-left: 15px;">Admin Menu: <p>
                                    <a class="dropdown-item"  href="{{ url('/dashboard') }}"><span class="font4a">Dashboard</span></a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <span class="font4a">Logout</span></a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                  </form>
                                @endif
                                </div>
                              </div>
                            </div>
                            </li>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        
    </div>
  
  <style type="text/css">
      .ui-corner-all{
        font-size:16px;
        font-color:#450b5a;
        background:#fff;
        border-color:transparent;
      }
      .ui-corner-all .ui-state-active{
        background:#450b5a !important;
          border-radius:50%;
          
      }
      .ui-corner-all .ui-state-highlight{
          background:#f6f6f6;
      }
      .ui-corner-all .ui-state-default{
          border-color:transparent;
          background:white;
          font-size:15px;
          text-align:center;
      }
      .ui-corner-all .ui-state-hover{
        background:#ae1ce2;
          color:#fff;
          border-color:#ae1ce2;
          border-radius:50%;

        }
        .dropdown-menu .dropdown-item:hover {
            background-color:#450b5a;
            color:#ffffff !important;
        }
        h5{
            color:#450b5a !important;
            font-size: 18px;
        }
        p{
            color: #000 ;
            font-weight: 500;
            font-size: 17px;
        }
        strong{
            color:#450b5a !important;
        }
        lead {
            color:#450b5a !important;
        }

        /* SHADE DAYS IN THE PAST #fff0ff-lightpurp  */
        td.fc-day.fc-past {
            background-color: #fff0ff !important;
        }
  </style>

    <div class="footer bg-white">
            <div class="copyright">
            <p><strong style="color:#450b5a !important">Mombasa IT Company</strong> © 2021 All Rights Reserved</p>
            </div>
    </div>


  <!--scripts-->
  <!-- Scripts -->
  <script src="{{ asset('/vendor/global/global.min.js') }}" ></script>
	<script src="{{ asset('/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('/js/custom.min.js') }}"></script>
    <script src="{{ asset('/js/deznav-init.js') }}"></script>
    <script src="{{ asset('/vendor/chart.js/Chart.bundle.min.js') }}"></script>
	<script src="{{ asset('/vendor/apexchart/apexchart.js') }}"></script>
    <!--datepicker-->
    <script src="{{ asset('/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('/js/jquery-ui.min.js') }}"></script>
   
    <script src="{{ asset('/js/moment.min.js') }}"></script>    
    <script src="{{ asset('/js/fullcalendar.js') }}"></script>
  
    <script>
        $(document).ready(function () {
          //  var today = new Date().toISOString().slice(0,10);
            
            var calendar = $('#calendar').fullCalendar({
                editable: true,
                displayEventTime: true,
                selectable: true,
                selectHelper: true,
                events:'homecal',
                initialView:'timeGridDay',
                fixedWeekCount:false,
                contentHeight:"auto",
                height: 697,
                aspectRatio: 1,
                handleWindowResize:true,
                showInvalidDates:false,
                eventMouseover: function(calEvent, jsEvent) {
                var tooltip = '<div class="tooltipevent"><u>Service:</u></br>'  + calEvent.title + '</br></br><u>Staff Name:</u></br> '+ calEvent.name +'</br></br><u>Features:</u></br>'+ calEvent.option1 +'</br>'+ calEvent.option2 +'</br>'+ calEvent.option3 +'</br></div>';
                $("body").append(tooltip);
                $(this).mouseover(function(e) {
                    $(this).css('z-index', 10000);
                    $('.tooltipevent').fadeIn('500');
                    $('.tooltipevent').fadeTo('10', 1.9);
                }).mousemove(function(e) {
                    $('.tooltipevent').css('top', e.pageY + 10);
                    $('.tooltipevent').css('left', e.pageX + 20);
                    });
                },

                eventMouseout: function(calEvent, jsEvent) {
                    $(this).css('z-index', 8);
                    $('.tooltipevent').remove();
                },
                validRange: {
                                // start: today
                            }
            })
        });
    </script>

    <script>
        $( function() {
            $( "#datepicker" ).datepicker({
                dateFormat:"yy-mm-dd",
                numberOfMonths:2,
                showNonCurrentDates:false
            })
            } ); 
    </script>
    <script>
        $(document).ready(function() {
        $('label').click(function() {
            $('label').removeClass('btn-primary');
            $(this).addClass('btn-primary');
        });
        });
    </script>
    <!-- <script>
         eventRender: function(event, element, view) {                   
            var ntoday = new Date().getTime();
            var eventEnd = moment( event.end ).valueOf();
            var eventStart = moment( event.start ).valueOf();
            if (!event.end){
                if (eventStart < ntoday){
                    element.addClass("past-event");
                    element.children().addClass("past-event");
                }
            } else {
                if (eventEnd < ntoday){
                    element.addClass("past-event");
                    element.children().addClass("past-event");
                }
            }
        }
    </script> -->


</body>
</html>
