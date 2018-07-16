@extends('layouts.manage')
@section('title_page', 'Danh mục quản lý | Trang quản trị')
@section('content')
  <div id="main"><!--Phần chứa nội dung chính-->
    <ol class="breadcrumb">
      <li><a href="{{ route('manage') }}"><i class="fa fa-home"></i> Trang quản trị</a></li>
    </ol>
    <div class="col-xs-12">
      <div class="menu">
        <a href="{{ route('manage') }}" class="col-md-2 col-sm-5 col-xs-5">
          <i class="fa fa-home"></i><br> <span>Trang quản trị</span>
        </a>
        <a href="{{ route('books.index') }}" class="col-md-2 col-sm-5 col-xs-5">
          <i class="fa fa-edit"></i><br> <span>Quản lý truyện</span>
        </a>
        <a href="{{ route('chapters.index') }}" class="col-md-2 col-sm-5 col-xs-5">
          <i class="fa fa-fire"></i><br> <span>Quản lý chương</span>
        </a>
        <a href="{{ route('categories.index') }}" class="col-md-2 col-sm-5 col-xs-5">
          <i class="fa fa-bars"></i><br> <span>Thể loại</span>
        </a>
        <a href="{{ route('reports.index') }}" class="col-md-2 col-sm-5 col-xs-5">
          <i class="fa fa-envelope-o"></i><br> <span>Danh sách lỗi</span>
        </a>
        <a href="{{ route('sliders.index') }}" class="col-md-2 col-sm-5 col-xs-5">
          <i class="fa fa-picture-o"></i><br> <span>Slider</span>
        </a>
        <a href="{{ route('users.index') }}" class="col-md-2 col-sm-5 col-xs-5">
          <i class="fa fa-user"></i><br> <span>Tài khoản</span>
        </a>
        <a href="setting.html" class="col-md-2 col-sm-5 col-xs-5">
          <i class="fa fa-wrench"></i><br> <span>Cấu hình</span>
        </a>
      </div>
    </div>
  </div>
@endsection
