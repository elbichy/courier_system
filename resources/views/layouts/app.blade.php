<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        {{ config('app.name', 'Courier Management System') }}@isset($title) - {{ $title }}@endisset
    </title>
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet"> <!-- font-awesome -->
    <link rel="stylesheet" href="{{asset('css/material-icons.css')}}">
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/wnoty.js')}}"></script>
    {!! MaterializeCSS::include_js() !!}
    {!! MaterializeCSS::include_css() !!}
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
    <style>
        :root {
            --primary-bg-dark: #164f6b; 
            --primary-bg-mid: #0e75a7; 
            --primary-bg-light: #039be5;  
            
            --primary-trans-bg-dark: #164f6b;
            --primary-trans-bg-light: #039be5;
            
            --secondary-bg-dark: #c91e0b; 
            --secondary-bg-light: #e93c29; 
            
            --switch-dark: #164f6b; 
            --switch-light: #039be5; 

            --button-dark: #164f6b; 
            --button-light: #039be5;
            --button-secondary: #c91e0b;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/datatable/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/wnoty.css')}}">
    <link rel="stylesheet"  href="{{asset('css/lightbox.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="app" id="app">
        {{-- Navbar goes here --}}
        <div id="space-for-sidenave" class="navbar-fixed">
            <nav>
                <div class="nav-wrapper">
                    {{-- Show View --}}
                    <a href="#" id="show-side-nav">
                        <i class="small material-icons white-text">menu</i>
                    </a>
                    {{-- BREADCRUMB --}}
                    <div class="left breadcrumbWrap hide-on-small-only">
                        @if(request()->segment(1) == 'administrator')
                            <a href="/administrator" class="breadcrumb">Administrator</a>
                        @else
                            <a href="/dashboard" class="breadcrumb">Dashboard</a>
                        @endif

                        <a href="/{{request()->segment(1)}}/{{request()->segment(2)}}" class="breadcrumb">{{(request()->segment(2) == '') ? 'Dashbord' : ucfirst(request()->segment(2))}}</a>
                        @if(request()->segment(3) != '')
                            <a href="/{{request()->segment(1)}}/{{ request()->segment(2) }}/{{request()->segment(3)}}" class="breadcrumb">{{ ucfirst(request()->segment(3)) }}</a>
                        @endif
                        @if(request()->segment(4) != '')
                            <a href="/{{request()->segment(1)}}/{{ request()->segment(2) }}/{{request()->segment(3)}}/{{request()->segment(4)}}" class="breadcrumb">{{ strtoupper(request()->segment(4)) }}</a>
                        @endif
                    </div>

                    {{-- OTHER MENU RIGHT --}}
                    <a href="#" data-target="slide-out" class="sidenav-trigger hide-on-med-and-up right"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li class="logOutBtn">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="material-icons right">power_settings_new</i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                    @auth
                    <ul class="right hide-on-small-only">
                         <p style="padding-right:12px;">Hi! {{ auth()->user()->name }}</p>
                    </ul>
                    @endauth
                </div>
            </nav>
        </div>

        {{-- SIDE NAV --}}
        <ul id="slide-out" class="sidenav sidenav-fixed" style="min-height: 100%; display: flex; flex-direction: column;">
            <div class="sideNavContainer">
                {{-- THE RED LOGO AREA --}}
                <li>
                    <div class="user-view">
                        {{-- Hide View --}}
                        <a href="#" id="hide-side-nav">
                            <i class="small material-icons white-text">close</i>
                        </a>

                        {{-- BUSINESS LOGO --}}
                        <a href="#user"><img class="circle" src="{{asset('storage/logo.jpg')}}"></a>
                    
                        {{-- BUSINESS NAME --}}
                        <a href="#name"><span class="white-text name"  style="font-size:16px;">
                            Courier Management System
                        </span></a>
                    </div>
                </li>
                <li class="{{(request()->segment(1) == 'dashboard' && request()->segment(2) == NULL) ? 'active' : ''}}">
                    <a href="/dashboard"><i class="material-icons">dashboard</i>DASHBOARD</a>
                </li>
                
                {{-- ADMIN MENU --}}
                @if(auth()->user()->isAdmin)
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                    <li class="{{ request()->segment(3) == 'delivery' ? 'active' : '' }}">
                        <a style="padding:0 32px;" class="collapsible-header">
                            <i class="fas fa-box-open white-text"></i>DELIVERIES<i class="material-icons right">arrow_drop_down</i>
                        </a>
                        <div class="collapsible-body">
                        <ul>
                            <li class="{{(request()->segment(4) == 'requests') ? 'active' : ''}}">
                                <a href="/dashboard/administrator/delivery/requests">Delivery Requests</a>
                            </li>
                            <li class="{{(request()->segment(4) == 'pending') ? 'active' : ''}}">
                                <a href="/dashboard/administrator/delivery/pending">Pending Deliveries</a>
                            </li>
                            <li class="{{(request()->segment(4) == 'completed') ? 'active' : ''}}">
                                <a href="/dashboard/administrator/delivery/completed">Completed Deliveries</a>
                            </li>
                            <li class="{{(request()->segment(4) == 'cancelled') ? 'active' : ''}}">
                                <a href="/dashboard/administrator/delivery/cancelled">Cancelled Deliveries</a>
                            </li>
                        </ul>
                        </div>
                    </li>
                    </ul>
                </li>
                @endif
                
                {{-- ADMIN MENU --}}
                @if(auth()->user()->isAdmin)
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                    <li class="{{ request()->segment(3) == 'users' ? 'active' : '' }}">
                        <a style="padding:0 32px;" class="collapsible-header">
                            <i class="fas fa-users white-text"></i>USERS<i class="material-icons right">arrow_drop_down</i>
                        </a>
                        <div class="collapsible-body">
                        <ul>
                            <li class="{{(request()->segment(4) == 'approved') ? 'active' : ''}}">
                                <a href="/dashboard/administrator/users/approved">Approved Users</a>
                            </li>
                            <li class="{{(request()->segment(4) == 'pending') ? 'active' : ''}}">
                                <a href="/dashboard/administrator/users/pending">Pending Users</a>
                            </li>
                            <li class="{{(request()->segment(4) == 'declined') ? 'active' : ''}}">
                                <a href="/dashboard/administrator/users/declined">Declined Users</a>
                            </li>
                        </ul>
                        </div>
                    </li>
                    </ul>
                </li>
                @endif

                {{-- USER MENU --}}
                @if(!auth()->user()->isAdmin)
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                    <li class="{{ request()->segment(3) == 'delivery' ? 'active' : '' }}">
                        <a style="padding:0 32px;" class="collapsible-header">
                            <i class="fas fa-box-open white-text"></i>DELIVERIES<i class="material-icons right">arrow_drop_down</i>
                        </a>
                        <div class="collapsible-body">
                        <ul>
                            <li class="{{(request()->segment(4) == 'new') ? 'active' : ''}}">
                                <a href="/dashboard/user/delivery/new">Book a Delivery</a>
                            </li>
                            <li class="{{(request()->segment(4) == 'requests') ? 'active' : ''}}">
                                <a href="/dashboard/user/delivery/requests">Pending Approvals</a>
                            </li>
                            <li class="{{(request()->segment(4) == 'inprogress') ? 'active' : ''}}">
                                <a href="/dashboard/user/delivery/inprogress">Deliveries In-progress</a>
                            </li>
                            <li class="{{(request()->segment(4) == 'completed') ? 'active' : ''}}">
                                <a href="/dashboard/user/delivery/completed">Completed Deliveries</a>
                            </li>
                            <li class="{{(request()->segment(4) == 'cancelled') ? 'active' : ''}}">
                                <a href="/dashboard/user/delivery/cancelled">Cancelled Deliveries</a>
                            </li>
                        </ul>
                        </div>
                    </li>
                    </ul>
                </li>
                @endif

                {{-- USER MENU --}}
                @if(!auth()->user()->isAdmin)
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                    <li class="{{ request()->segment(2) == 'personnel' ? 'active' : '' }}">
                        <a style="padding:0 32px;" class="collapsible-header">
                            <i class="fas fa-user white-text"></i></i>MY PROFILE<i class="material-icons right">arrow_drop_down</i>
                        </a>
                        <div class="collapsible-body">
                        <ul>
                            <li class="{{(request()->segment(3) == 'all') ? 'active' : ''}}">
                                <a href="/dashboard/user/profile/edit">Edit Profile</a>
                            </li>
                            <li class="{{(request()->segment(3) == 'all') ? 'active' : ''}}">
                                <a href="/dashboard/user/password/change">Change Password</a>
                            </li>
                        </ul>
                        </div>
                    </li>
                    </ul>
                </li>
                @endif

                {{-- OTHER MENU RIGHT FOR MOBILE DEVICES --}}
                <li class="hide-on-med-and-up col s12" style="border-top:1px solid rgba(0,0,0, 0.3); justify-self: flex-end; margin-top: auto;">
                    <ul class="right col s8" style="display:flex; justify-content:center; align-items:center; width:20%;">
                        <li class="logOutBtn">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i style="margin:0;" class="material-icons left">power_settings_new</i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                    <ul class="col s4 right white-text" style="display:flex; justify-content:center; align-items:center; width:80%;">
                        @if(auth()->check())
                            <a class="white-text" href="#">{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</a>
                        @endif
                    </ul>
                </li>
            </div>
        </ul>

        {{-- CONTENT AREA    --}}
        @yield('content')

    <script>
        let base_url = '{{ asset('/') }}';

        $(document).ready(function(){
            $('#hide-side-nav').click(function(e){
                $(this).fadeOut();
                $('#slide-out').animate({
                    'width': '0px'
                });
                $('.my-content-wrapper').animate({
                    'padding-left': '0px'
                });
                $('#users-table').animate({
                    'width': '100%'
                });
                $('#users-table').animate({
                    'width': '100%'
                });
                $('.breadcrumbWrap').animate({
                   'margin-left': '0px'
                });
                $('#show-side-nav').animate({
                    'width': '60px',
                    'margin-right': '20px'
                });
            });
            $('#show-side-nav').click(function(e){
                $('#hide-side-nav').fadeIn();
                $('#slide-out').animate({
                    'width': '300px'
                });
                $('.my-content-wrapper').animate({
                    'padding-left': '300px'
                });
                $('#users-table').animate({
                    'width': '100%'
                });
                $('.breadcrumbWrap').animate({
                   'margin-left': '310px'
                });
                $('#show-side-nav').animate({
                    'width': '0px',
                    'margin-right': '0px'
                });
            });
        });
    </script>
    <script src="{{ asset('js/lightbox.js') }}"></script>
    @stack('scripts')
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')
</body>
</html>
