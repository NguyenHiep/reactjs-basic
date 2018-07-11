@extends('layouts.manage')
@section('content')
  <div id="main">
    <ol class="breadcrumb">
      <li><a href="{{ route('manage') }}"><i class="fa fa-home"></i> Trang quản trị</a></li>
      <li class="active">Chương</li>
    </ol>
    <div class="col-xs-12">
      @includeIf('manage._includes.message')
      <div class="col-xs-12">
        <div class="title-block">
          <h2>Danh sách chương</h2>
          <div class="right-area">
            <ul class="list-unstyled panel-layout btn-box-01">
              <li>
                <a href="{{ route('chapters.create') }}" class="btn btn-primary">
                  <small><i class="fa fa-plus-circle"></i></small>Thêm mới</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-xs-12" style="margin-top: 15px">
          @includeIf('manage.block.partials.dataTable', [
            'id'        => 'chapters',
            'routeAjax' => route('chapters.index'),
            'columns'   => $columns,
            'fields'    => $fields,
           ])
      </div>
    </div>
  </div>
@endsection