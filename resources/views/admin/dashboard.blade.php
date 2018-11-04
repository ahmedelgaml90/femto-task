<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Alpha | Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta charset="UTF-8">
    <meta name="description" content="Responsive Admin Dashboard Template" />
    <meta name="keywords" content="admin,dashboard" />
    <meta name="author" content="Steelcoders" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1"
        crossorigin="anonymous">
    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="{{ asset('admin-assets/assets/plugins/materialize/css/materialize.min.css')}}" />
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('admin-assets/assets/plugins/metrojs/MetroJs.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin-assets/assets/plugins/weather-icons-master/css/weather-icons.min.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('admin-assets/ckeditor/ckeditor.js')}}"></script>

    <!-- Theme Styles -->
    <link href="{{ asset('admin-assets/assets/css/alpha.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/assets/css/custom.css')}}" rel="stylesheet" type="text/css" />

    <style>
        .error {
            color: green;
        }

        .alert-success {
            background-color: #dff0d8;
            border-color: #d0e9c6;
            color: #3c763d;
        }

        .alert {
            padding: 1rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: .25rem;
        }

        .pagination li.active {
            background-color: #fff;
            color: #00acc1;
        }
    </style>
</head>

<body>
    <div class="loader-bg"></div>
    <div class="loader">
        <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
            <div class="spinner-layer spinner-teal lighten-1">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="mn-content fixed-sidebar">
        <header class="mn-header navbar-fixed">
            <nav class="cyan darken-1">
                <div class="nav-wrapper row">
                    <section class="material-design-hamburger navigation-toggle">
                        <a href="javascript:void(0)" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                            <span class="material-design-hamburger__layer"></span>
                        </a>
                    </section>
                    <div class="header-title col s3 m3">
                        <span class="chapter-title"></span>
                    </div>
                    <ul class="right col s9 m3 nav-right-menu">
                    </ul>

                </div>
            </nav>
        </header>
        <aside id="slide-out" class="side-nav white fixed">
            <div class="side-nav-wrapper">
                <div class="sidebar-profile">
                    <div class="sidebar-profile-image">
                        <img src="{{ asset('admin-assets/assets/images/profile-image.png') }}" class="circle" alt="">
                    </div>
                    <div class="sidebar-profile-info">
                        <a href="javascript:void(0);" class="account-settings-link">
                            <p>{{ Auth::user()->name }}</p>
                            <span> @if (Auth::user()->permission == 1) Admin @else Employee @endif<i class="material-icons right">arrow_drop_down</i></span>
                        </a>
                    </div>
                </div>
                <div class="sidebar-account-settings">
                    <ul>
                        <li class="no-padding">
                        </li>
                        <li class="no-padding">
                        </li>
                        <li class="no-padding">
                            <a class="waves-effect waves-grey" href="{{ url('controll/users/'.Auth::user()->id.'/edit')}}"><i
                                    class="material-icons">account_circle</i>My Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li class="no-padding">
                            <a class="waves-effect waves-grey" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                    class="material-icons">exit_to_app</i>Sign Out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>


                        </li>
                    </ul>
                </div>
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                    <li class="no-padding active"><a class="waves-effect waves-grey active" href="{{ url('/controll') }}"><i
                                class="material-icons">settings_input_svideo</i>Dashboard</a></li>
                    @if(Auth()->user()->permission == 1)

                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">supervisor_account</i>Employees<i
                                class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ url('controll/users')}}">Show All</a></li>
                                <li><a href="{{ url('controll/users/create')}}">Add Employee</a></li>

                            </ul>
                        </div>
                    </li>
                    @endif

                    <li class="no-padding "><a class="waves-effect waves-grey" href="{{ url('controll/companies') }}"><i
                                class="material-icons">group</i>Companies</a></li>
                </ul>

            </div>
        </aside>
        <main class="mn-inner inner-active-sidebar">
            <div class="middle-content">
                @yield('content')
                
        </main>

    </div>
    <div class="left-sidebar-hover"></div>


    <!-- Javascripts -->
    <script src="{{ asset('admin-assets/assets/plugins/jquery/jquery-2.2.0.min.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/plugins/materialize/js/materialize.min.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/plugins/material-preloader/js/materialPreloader.min.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/plugins/jquery-blockui/jquery.blockui.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/plugins/waypoints/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/plugins/counter-up-master/jquery.counterup.min.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/plugins/chart.js/chart.min.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/plugins/flot/jquery.flot.min.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/plugins/flot/jquery.flot.time.min.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/plugins/flot/jquery.flot.symbol.min.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/plugins/flot/jquery.flot.resize.min.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/plugins/curvedlines/curvedLines.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/plugins/peity/jquery.peity.min.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/js/alpha.min.js')}}"></script>
    <!--        <script src="{{ asset('admin-assets/assets/js/pages/dashboard.js')}}"></script>-->
    <script src="{{ asset('admin-assets/assets/js/ajax.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/js/pages/form_elements.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/plugins/flot/jquery.flot.pie.min.js')}}"></script>
   <script src="{{ asset('admin-assets/assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/js/pages/charts.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/plugins/d3/d3.min.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/plugins/nvd3/nv.d3.min.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/js/alpha.min.js')}}"></script>
</body>

</html>