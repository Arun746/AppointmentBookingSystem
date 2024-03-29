<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-Gn538LgJlrs1m2DpXxXsGRuugT6DO0nPEqSkdgJ8Bdf2Oo45/jGzP+9eK1vXQsP48+fq2aXnOMN4rZcwB94LNiQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    @yield('styles')
    {{-- nepalicalendar --}}
    <link href="https://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/css/nepali.datepicker.v4.0.1.min.css"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/repeat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/content.css') }}">

    {{-- chartJs library --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .navbar-nav .dropdown-menu li:hover {
            background-color: rgb(150, 150, 150) !important;
            transition: background-color 0.3s !important;
        }
    </style>


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-bell fa-lg" style="color: rgb(62, 147, 183)"></i>

                        @if (auth()->user()->unreadNotifications->count())
                            <span
                                class="badge badge-warning navbar-badge">{{ auth()->user()->unreadNotifications->count() }}</span>
                        @endif
                    </a>

                    <ul class="dropdown-menu dropdown-menu-xl" style="background-color: rgb(59, 115, 117); ">
                        <span class=" dropdown-header">
                            <h4 style="color:rgb(251, 253, 255);">Notifications</h4>
                        </span>

                        @foreach (auth()->user()->unreadNotifications as $notification)
                            <li class="text-center " style="background-color: rgb(107, 193, 168); color: aliceblue; ">
                                <a href="{{ route('markRead') }}">{{ $notification->data['data'] }}</a>
                                <div class="dropdown-divider mt-5"></div>
                            </li>
                        @endforeach

                        @foreach (auth()->user()->readNotifications->take(7) as $notification)
                            <li class="text-center notification-dropdown-item"
                                style="background-color: rgb(152, 163, 163); color: aliceblue; transition: background-color 0.3s;">
                                <a>{{ $notification->data['data'] }}</a>
                                <div class="dropdown-divider mt-5"></div>
                            </li>
                        @endforeach

                        <div class="dropdown-divider"></div>
                        <a href="{{ route('markRead') }}" class="dropdown-item dropdown-footer"
                            style="background-color: rgb(59, 115, 117);color:aliceblue; ">Mark All as
                            read</a>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                        {{ Auth::user()->fname }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px;">
                        <a href="{{ route('profile.show') }}" class="dropdown-item">
                            <i class="mr-2 fas fa-file"></i>
                            {{ __('My profile') }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" class="dropdown-item"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="mr-2 fas fa-sign-out-alt"></i>
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:  rgba(49, 59, 59, 0.8) ;">

            <i class="brand-link">
                <img src="{{ asset('images/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">ABS</span>
            </i>
            @include('layouts.navigation')
        </aside>


        <div class="background-image"
            style="background-image: url('https://companyclinic.net/wp-content/uploads/doctor-stethoscope-png-hd-stethoscope-4320-1024x680.jpg');">
            <div class="content-wrapper" style="background-color: rgba(238, 243, 243, 0.8); color: rgb(10, 10, 10);">
                @yield('content')
            </div>
        </div>



        @vite('resources/js/app.js')
        <script src="{{ asset('js/adminlte.min.js') }}" defer></script>

        @yield('scripts')

        <script src="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v4.0.1.min.js"
            type="text/javascript"></script>
        <script src="{{ asset('js/nepalidatepick.js') }}"></script>
        <script src="{{ asset('js/calendar.js') }}"></script>
        <script src="{{ asset('js/wizardform.js') }}"></script>
        <script src="{{ asset('js/formrepeater.js') }}"></script>
        <script src="{{ asset('js/schedulerepeater.js') }}"></script>
        <script src="{{ asset('js/currentdate.js') }}"></script>
        <script src="{{ asset('js/doctorPiechart.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



</body>

</html>
