@extends('layouts.manage')

@section('content')
  <div id="main"><!--Phần chứa nội dung chính-->
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="fa fa-home"></i> Trang quản trị</a></li>
    </ol>
    <div class="col-xs-12">
      <div class="menu">
        <a href="index.html" class="col-md-2 col-sm-5 col-xs-5">
          <i class="fa fa-home"></i><br> <span>Trang quản trị</span>
        </a>
        <a href="post.html" class="col-md-2 col-sm-5 col-xs-5">
          <i class="fa fa-edit"></i><br> <span>Tin tức</span>
        </a>
        <a href="product.html" class="col-md-2 col-sm-5 col-xs-5">
          <i class="fa fa-fire"></i><br> <span>Sản phẩm</span>
        </a>
        <a href="type_product.html" class="col-md-2 col-sm-5 col-xs-5">
          <i class="fa fa-bars"></i><br> <span>Loại sản phẩm</span>
        </a>
        <a href="contact.html" class="col-md-2 col-sm-5 col-xs-5">
          <i class="fa fa-envelope-o"></i><br> <span>Phản hồi</span>
        </a>
        <a href="slider.html" class="col-md-2 col-sm-5 col-xs-5">
          <i class="fa fa-picture-o"></i><br> <span>Slider</span>
        </a>
        <a href="user.html" class="col-md-2 col-sm-5 col-xs-5">
          <i class="fa fa-user"></i><br> <span>Tài khoản</span>
        </a>
        <a href="setting.html" class="col-md-2 col-sm-5 col-xs-5">
          <i class="fa fa-wrench"></i><br> <span>Cấu hình</span>
        </a>
      </div>
    </div>
  </div>
@endsection
