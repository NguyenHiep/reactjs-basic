@extends('layouts.app')

@php $title_seo = 'Chỉnh sửa thông tin' @endphp
@section('seo_title', $title_seo.' | Đọc truyện tranh online | truyentranhfc.com')
@section('seo_keywords', $title_seo.', Đọc truyện tranh online, One Piece, Hiệp khách giang hồ, Fairy Tail, Naruto, Bleach, Toriko,...')
@section('seo_description', $title_seo.', Đọc truyện tranh online mới nhất, nhanh nhất như One Piece, Hiệp khách giang hồ, Fairy Tail, Naruto, Bleach, Toriko,..')

@section('content')
  <div class="breadcrumb-contain">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li><a href="javascript:;" title="Chỉnh sửa thông tin"> Chỉnh sửa thông tin</a>
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
        <h3 class="title-control">Thay đổi thông tin</h3>
        <div class="row">
          <div class="col-md-12">
            @includeIf('frontend._includes.message')
            <form name="form" id="form" action="{{ route('front.profile.update') }}" method="POST" enctype="multipart/form-data">
              {{ csrf_field()}}
              <div class="form-groupuser">
                <label>Tên đăng nhập</label>
                <input type="text" class="infouser" value="{{ Auth::user()->name ?? null }}" disabled>
              </div>
              <div class="form-groupuser">
                <label>Tên hiển thị <span class="required">*</span></label>
                <input type="text" class="infouser" name="fullname" value="{{ old('fullname', Auth::user()->fullname) }}" placeholder="Nhập tên hiển thị"/>
              </div>
              <div class="form-groupuser">
                <label>Email</label>
                <input type="text" class="infouser" name="email" value="{{ Auth::user()->email ?? null }}" disabled />
              </div>
              <div class="form-groupuser">
                <label>Hình đại diện
                  <input type="file" id="avatar" name="avatar" accept="image/*"> ( Kích thước tối thiểu 100x100)
                </label>
              </div>
              <div class="form-groupuser">
                <label>CMND</label>
                <input type="text" class="infouser" id="card" name="card" value="{{ old('card', Auth::user()->card) }}" placeholder="Nhập chứng minh thư" />
              </div>
              <div class="form-groupuser">
                <label>Số điện thoại</label>
                <input type="text" class="infouser" id="phone" name="phone" value="{{ old('phone', Auth::user()->phone) }}" placeholder="Nhập số điện thoại" />
              </div>
              <div class="form-groupuser">
                <label>Ngày sinh</label>
                <input type="text" class="infouser datepicker" id="birthday" name="birthday" value="{{ old('birthday', Auth::user()->birthday) }}" />
              </div>
              <div class="form-groupuser">
                <label>Chữ ký</label>
                <textarea class="infouser" rows="3" name="sign" id="sign" placeholder="Nhập chữ ký">{{ old('sign', Auth::user()->sign) }}</textarea>
              </div>
              <button type="submit" class="button-submit">Cập nhật</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
