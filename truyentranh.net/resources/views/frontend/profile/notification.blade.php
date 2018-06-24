@extends('layouts.app')

@php $title_seo = 'Danh sách truyện theo dõi' @endphp
@section('seo_title', $title_seo.' | Đọc truyện tranh online | yeutruyentranh.com')
@section('seo_keywords', $title_seo.', Đọc truyện tranh online, One Piece, Hiệp khách giang hồ, Fairy Tail, Naruto, Bleach, Toriko,...')
@section('seo_description', $title_seo.', Đọc truyện tranh online mới nhất, nhanh nhất như One Piece, Hiệp khách giang hồ, Fairy Tail, Naruto, Bleach, Toriko,..')

@section('content')
  <div class="breadcrumb-contain">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li><a href="javascript:;" title="Thông báo"> Thông báo</a>
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
        <h3 class="title-control">Thông báo</h3>
        <div class="row">
          <div class="col-md-12">
            @if(!empty($notifications))
              @foreach($notifications as $notification)
                <div class="media media-followuser">
              <div class="media-left">
                <a href="#">
                  <img src="{{ asset(PATH_IMAGE_DEFAULT) }}" alt="hott1" class="image_circle">
                </a>
              </div>
              <div class="media-body">
                <a href="#">
                  <h4 class="manga-newest">Fshare.vn tặng các thành viên vechai.info 1GB dung lượng tải tốc độ cao miễn phí. Tham gia ngay!</h4>
                </a>
                <p class="description-user"><span>Cập nhật: </span>2018-06-16 20:12:21
                </p></div>
            </div>
              @endforeach
            @else
              <p class="text-left">Hiện tại chưa có thông báo từ quản trị viên</p>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="pagelist">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
