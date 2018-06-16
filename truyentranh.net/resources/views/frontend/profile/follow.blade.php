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
            <li><a href="javascript:;" title="Truyện theo dõi"> Truyện theo dõi</a>
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
        <h3 class="title-control">Truyện theo dõi</h3>
        <div class="row">
          <div class="col-md-12">
            <div class="media media-followuser">
              <div class="media-left">
                <a href="http://truyentranh.net/Quy-Sai"><img src="http://cdn.truyentranh.net/upload/image/comic/20180321/Quy-Sai-5ab256ef6fc5f-thumbnail-176x264.jpg" alt="Quỷ Sai" class="image_follow"></a>
              </div>
              <div class="media-body">
                <a href="http://truyentranh.net/Quy-Sai" title="Quỷ Sai">
                  <h4 class="manga-newest">Quỷ Sai</h4></a>
                <p class="description-user">
                  <span>Tên khác:</span> Quy-Sai<br>
                  <span>Thể loại:</span> <a href="http://truyentranh.net/the-loai/Manhua.48.html" title="Manhua" class="CateName">Manhua</a><br>
                  <span>Tác giả:</span> Đang Cập Nhật...<br>
                  <span>Cập nhật:</span><a href="http://truyentranh.net/Quy-Sai/Chap-053"> Quỷ Sai Chap 053 </a>
                </p>
              </div>
            </div>
            <div class="media media-followuser">
              <div class="media-left">
                <a href="http://truyentranh.net/Linh-Nhan-Truyen-Thuyet"><img src="http://cdn.truyentranh.net/upload/image/comic/20180314/Linh-Nhan-Truyen-Thuyet-5aa94aebee9ee-thumbnail-176x264.jpg" alt="Linh Nhận Truyền Thuyết" class="image_follow"></a>
              </div>
              <div class="media-body">
                <a href="http://truyentranh.net/Linh-Nhan-Truyen-Thuyet" title="Linh Nhận Truyền Thuyết">
                  <h4 class="manga-newest">Linh Nhận Truyền Thuyết</h4></a>
                <p class="description-user">
                  <span>Tên khác:</span> Linh-Nhan-Truyen-Thuyet<br>
                  <span>Thể loại:</span> <a href="http://truyentranh.net/the-loai/Manhua.48.html" title="Manhua" class="CateName">Manhua</a>, <a href="http://truyentranh.net/the-loai/Supernatural.39.html" title="Supernatural" class="CateName">Supernatural</a>, <a href="http://truyentranh.net/the-loai/Shounen.32.html" title="Shounen" class="CateName">Shounen</a>, <a href="http://truyentranh.net/the-loai/Mystery.23.html" title="Mystery" class="CateName">Mystery</a>, <a href="http://truyentranh.net/the-loai/Fantasy.11.html" title="Fantasy" class="CateName">Fantasy</a><br>
                  <span>Tác giả:</span> Đang cập nhật<br>
                  <span>Cập nhật:</span><a href="http://truyentranh.net/Linh-Nhan-Truyen-Thuyet/Chap-214"> Linh Nhận Truyền Thuyết Chap 214 </a>
                </p>
              </div>
            </div>
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
