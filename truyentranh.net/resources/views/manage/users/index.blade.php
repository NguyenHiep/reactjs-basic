@extends('layouts.manage')
@section('title_page', 'Danh sách tài khoản')
@section('content')
  <div id="main">
    <ol class="breadcrumb">
      <li><a href="{{ route('manage') }}"><i class="fa fa-home"></i> Trang quản trị</a></li>
      <li class="active">Tài khoản</li>
    </ol>
    <div class="col-xs-12">
      @includeIf('manage._includes.message')
      <div class="col-xs-12">
        <div class="title-block">
          <h2>Danh sách tài khoản</h2>
          <div class="right-area">
            <ul class="list-unstyled panel-layout btn-box-01">
              <li>
                <a href="{{ route('users.create') }}" class="btn btn-primary">
                  <i class="fa fa-plus-circle"></i> Thêm tài khoản mới</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-xs-12" style="margin-top: 15px">
          @includeIf('manage.block.partials.dataTable', [
            'id'        => 'users',
            'routeAjax' => route('users.index'),
            'columns'   => $columns,
            'fields'    => $fields,
           ])
      </div>
      <div class="col-xs-12">
        <div class="note-board">
          <p><strong><i class="fa fa-bookmark"></i>Ghi chú: </strong></p>
          <p class="note-items"><i class="fa fa-check text-success"></i>Hiển thị</p>
          <p class="note-items"><i class="fa fa-times text-danger"></i>Ẩn với người dùng</p>
        </div>
      </div>
    </div>
  </div>
@endsection