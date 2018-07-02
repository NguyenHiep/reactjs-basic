@extends('layouts.app')

@section('seo_title', 'Đăng nhập | Đọc truyện tranh online | yeutruyentranh.com')
@section('seo_keywords', 'Đọc truyện tranh online, One Piece, Hiệp khách giang hồ, Fairy Tail, Naruto, Bleach, Toriko,...')
@section('seo_description', 'Đọc truyện tranh online mới nhất, nhanh nhất như One Piece, Hiệp khách giang hồ, Fairy Tail, Naruto, Bleach, Toriko,..')

@section('content')
  <div class="breadcrumb-contain">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="javascript:;" title="Đăng nhập"> Đăng nhập</a>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-6">
        <div class="login-form">
          <h1 class="title-body">Đăng nhập</h1>
          <div class="form-body">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}
              {{ Form::hidden('ref', request()->query('ref')) }}
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
        @includeIf('frontend.block.login-social')
      </div>
    </div>
  </div>
@endsection
