<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <base href="{{  URL::current() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Quản trị hệ thống') }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/manage/favicon.png') }}">
    <link href="{{ asset('assets/manage/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/manage/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/manage/css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/manage/css/introjs.min.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('assets/manage/js/jquery-1.10.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/manage/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/manage/js/intro.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/manage/js/admin.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/manage/js/actions.js') }}"></script>
    <!--Hỗ trợ IE nhận dạng thẻ HTML5-->
    <!--[if lt IE 9]>
    <script src="{{ asset('assets/manage/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('assets/manage/js/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body>
    <nav class="navbar navbar-inverse" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('manage') }}"><i class="fa fa-cogs"></i> Quản trị hệ thống</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          @guest
          @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{ Auth::user()->name }}<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-user"></i> Chỉnh sửa tài khoản</a></li>
                  
                    <li>
                      <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Đăng xuất</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>
                    </li>
                </ul>
            </li>
          @endguest
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
    <div class="clearfix">
      <div id="sidebar-bg"></div>
      @include('manage._includes.sidebar')
      @yield('content')
      <!--END #main-->
    </div>
</body>
</html>
