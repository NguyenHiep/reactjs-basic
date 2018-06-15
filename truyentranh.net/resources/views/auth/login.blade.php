@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-md-center mt-5 mb-5">
      <div class="col-md-6">
        <div class="login-form">
          <h1 class="title-body">Đăng nhập</h1>
          <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}
              <div class="form-group row">
                <label for="email" class="col-lg-3 col-form-label text-lg-left">E-Mail</label>
                <div class="col-lg-9">
                  <input
                    id="email"
                    type="email"
                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                  >
                  @if ($errors->has('email'))
                    <div class="invalid-feedback">
                      <strong>{{ $errors->first('email') }}</strong>
                    </div>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label for="password" class="col-lg-3 col-form-label text-lg-left">Mật khẩu</label>
                <div class="col-lg-9">
                  <input
                    id="password"
                    type="password"
                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                    name="password"
                    required
                  >
                  @if ($errors->has('password'))
                    <div class="invalid-feedback">
                      <strong>{{ $errors->first('password') }}</strong>
                    </div>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-9 offset-lg-3">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }}> Nhớ mật khẩu
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-9 offset-lg-3">
                  <button type="submit" class="btn btn-primary">Đăng nhập</button>
                </div>
                <div class="col-lg-9 offset-lg-3">
                  <p class="registry mt-3">Bạn chưa có tài khoản?<a href="{{ url('/register') }}"> Đăng ký ngay</a> /<a href="{{ route('password.request') }}"> Quên mật khẩu?</a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="login-social">
          <h3 class="title-body">Đăng nhập nhanh bằng:</h3>
          <div class="login-social">
            <a id="btn-login-fb" href="http://truyentranh.net/dang-nhap-bang-facebook.html?ref=http://truyentranh.net/">
              <img src="http://cdn.truyentranh.net/frontend/images/fblogin.png" alt="fblogin" class="mb-2">
            </a>
            <a id="btn-login-gp" href="http://truyentranh.net/dang-nhap-bang-google.html?ref=http://truyentranh.net/">
              <img src="http://cdn.truyentranh.net/frontend/images/gplus.png" alt="gglogin" class="mb-2">
            </a>
            <a href="#" id="btn-login-tw">
              <img src="http://cdn.truyentranh.net/frontend/images/twitter.png" alt="twlogin" class="mb-2">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
