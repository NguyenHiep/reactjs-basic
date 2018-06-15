@extends('layouts.app')

@section('seo_title', 'Đăng ký thành viên | Đọc truyện tranh online | yeutruyentranh.com')
@section('seo_keywords', 'Đọc truyện tranh online, One Piece, Hiệp khách giang hồ, Fairy Tail, Naruto, Bleach, Toriko,...')
@section('seo_description', 'Đọc truyện tranh online mới nhất, nhanh nhất như One Piece, Hiệp khách giang hồ, Fairy Tail, Naruto, Bleach, Toriko,..')


@section('content')
  <div class="breadcrumb-contain">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="javascript:;" title="Đăng nhập"> Đăng ký</a>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-6">
        <div class="register-form">
          <h1 class="title-body">Đăng ký</h1>
          <div class="form-body">
            <form role="form" method="POST" action="{{ url('/register') }}">
              {!! csrf_field() !!}
              <div class="form-group row">
                <label class="col-lg-3 col-form-label text-lg-left">Họ và tên</label>

                <div class="col-lg-9">
                  <input
                    type="text"
                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                    name="name"
                    value="{{ old('name') }}"
                    required
                  >
                  @if ($errors->has('name'))
                    <div class="invalid-feedback">
                      <strong>{{ $errors->first('name') }}</strong>
                    </div>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label text-lg-left">E-Mail</label>
                <div class="col-lg-9">
                  <input
                    type="email"
                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                    name="email"
                    value="{{ old('email') }}"
                    required
                  >
                  @if ($errors->has('email'))
                    <div class="invalid-feedback">
                      <strong>{{ $errors->first('email') }}</strong>
                    </div>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label text-lg-left">Mật khẩu</label>
                <div class="col-lg-9">
                  <input
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
                <label class="col-lg-3 col-form-label text-lg-left">Xác nhận mật khẩu</label>
                <div class="col-lg-9">
                  <input
                    type="password"
                    class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                    name="password_confirmation"
                    required
                  >
                  @if ($errors->has('password_confirmation'))
                    <div class="invalid-feedback">
                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </div>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label text-lg-left"></label>
                <div class="col-lg-9">{{ Form::capcha('g-recaptcha-response') }}</div>
                @if ($errors->has('g-recaptcha-response'))
                  <div class="invalid-feedback">
                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                  </div>
                @endif
              </div>
              <div class="form-group row">
                <div class="col-lg-9 offset-lg-3">
                  <button type="submit" class="btn btn-primary">Đăng ký</button>
                </div>
                <div class="col-lg-9 offset-lg-3">
                  <p class="registry mt-3">Bạn đã có tài khoản?<a href="{{ url('/login') }}"> Đăng nhập ngay</a> /<a href="{{ route('password.request') }}"> Quên mật khẩu?</a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        @includeIf('frontend.block.login-social')
      </div>
    </div>
  </div>
@endsection
