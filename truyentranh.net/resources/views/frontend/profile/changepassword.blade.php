@extends('layouts.app')

@php $title_seo = 'Thay đổi mật khẩu' @endphp
@section('seo_title', $title_seo.' | Đọc truyện tranh online | yeutruyentranh.com')
@section('seo_keywords', $title_seo.', Đọc truyện tranh online, One Piece, Hiệp khách giang hồ, Fairy Tail, Naruto, Bleach, Toriko,...')
@section('seo_description', $title_seo.', Đọc truyện tranh online mới nhất, nhanh nhất như One Piece, Hiệp khách giang hồ, Fairy Tail, Naruto, Bleach, Toriko,..')

@section('content')
  <div class="breadcrumb-contain">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li><a href="javascript:;" title="Chỉnh sửa thông tin">Thay đổi mật khẩu</a>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        @includeIf('frontend._includes.sidebar-profile')
      </div>
      <div class="col-md-9">
        <h3 class="title-control">Đổi mật khẩu</h3>
        <div class="row">
          <div class="col-md-12">
            <form name="form" id="formResetPass" action="" method="POST">
              <div class="form-groupuser">
                <label>Mật khẩu cũ</label>
                <input type="password" class="infouser" name="oldpass" id="oldpass">
              </div>
              <div class="form-groupuser">
                <label>Mật khẩu mới</label>
                <input type="password" class="infouser" name="newpass" id="newpass">
              </div>
              <div class="form-groupuser">
                <label>Nhập lại mật khẩu mới</label>
                <input type="password" class="infouser" name="newpass_conf" id="newpass_conf">
              </div>
              <button type="submit" class="button-submit">Hoàn tất</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
