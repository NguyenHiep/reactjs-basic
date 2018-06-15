@extends('layouts.app')

@section('content')
  <div class="breadcrumb-contain">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="javascript:;" title="Quên mật khẩu"> Quên mật khẩu</a>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-6">
        <div class="resetpassword-email">
          <h1 class="title-body">Quên mật khẩu</h1>
          <div class="form-body">
            @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
            @endif
            <form role="form" method="POST" action="{{ url('/password/email') }}">
              {!! csrf_field() !!}
              <div class="form-group row">
                <label class="col-lg-3 col-form-label text-lg-left">E-Mail</label>
                <div class="col-lg-9">
                  <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                  @if ($errors->has('email'))
                    <div class="invalid-feedback">
                      <strong>{{ $errors->first('email') }}</strong>
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
                  <button type="submit" class="btn btn-primary">Lấy mật khẩu</button>
                </div>
                <div class="col-lg-9 offset-lg-3">
                  <p class="registry mt-3">Bạn chưa có tài khoản?<a href="{{ url('/register') }}"> Đăng ký</a> /<a href="{{ url('/login') }}">Đăng nhập</a></p>
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
