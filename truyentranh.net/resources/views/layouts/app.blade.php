<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> @yield('seo_title')</title>
  <meta name="keywords" content="@yield('seo_keywords')" />
  <meta name="description" content="@yield('seo_description')" >
  <script src='https://www.google.com/recaptcha/api.js?hl=vi'></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link href="{{ asset('assets/frontend/plugins/slick/slick/slick.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/plugins/slick/slick/slick-theme.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/plugins/scrollbar/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
  @include('frontend._includes.header')
  @yield('sliders')
    @php
      $router_expect = [
        'front.books.showdetail',
        'login',
        'register',
        'password.request',
        'front.profile.edit',
        'front.profile.follow',
        'front.profile.changepassword',
        'front.profile.notification',
      ];
    @endphp
    @if(in_array(Route::currentRouteName(), $router_expect))
      @yield('content')
    @else
      @yield('breadcrumb')
      <main id="content">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-lg-8">
              @yield('content')
            </div>
            <div class="col-xs-12 col-lg-4">
              <div class="row">
                <div class="col-md-12">
                  <div class="history-read">
                    <p class="save-manga">
                      <a href="{{ url('/login') }}">
                        <img src="http://cdn.truyentranh.net/frontend/images/clockfix.png"/>
                        Xem lịch sử đọc truyện của bạn
                      </a>
                    </p>
                  </div>
                </div>
              </div>
              <div class="row">
                @include('frontend._includes.sidebar')
              </div>
            </div>
        </div>
      </div>
    </main>
    @endif
  @include('frontend._includes.footer')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="{{ asset('assets/frontend/plugins/slick/slick/slick.min.js') }}"></script>
<script src="{{ asset('assets/frontend/plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('assets/frontend/plugins/datetimepicker/build/jquery.datetimepicker.full.js') }}"></script>
<script src="{{ asset('assets/frontend/main.js') }}"></script>
</body>
</html>
