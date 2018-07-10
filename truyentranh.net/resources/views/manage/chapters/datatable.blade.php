@extends('layouts.manage')
@section('content')
  <div id="main">
    <ol class="breadcrumb">
      <li><a href="{{ route('manage') }}"><i class="fa fa-home"></i> Trang quản trị</a></li>
      <li class="active">Chương</li>
    </ol>
    <div class="col-xs-12">
      @include('manage._includes.message')
      <div class="col-xs-12">
        <div class="title-block">
          <h2>Danh sách chương</h2>
          <div class="right-area">
            <ul class="list-unstyled panel-layout btn-box-01">
              <li>
                <a class="btn btn-default" data-toggle="collapse" href="#search_advanced"><small><i class="fa fa-search"></i></small> Tìm kiếm</a>
              </li>
              <li>
                <a href="{{ route('chapters.create') }}" class="btn btn-primary"><small><i class="fa fa-edit"></i></small> Thêm mới</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <table class="table table-bordered table-hover" id="table">
        <thead>
        <tr>
          {{--<th><input id="check_all" type="checkbox"></th>--}}
          <th class="hidden-xs">ID</th>
          <th>Tên chương</th>
          <th class="hidden-xs">Nổi bật</th>
          <th>Tình trạng</th>
          <th>Ngày tạo</th>
         {{-- <th>Sửa</th>
          <th>Xóa</th>--}}
        </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
  <script>
      $(function() {
          $('#table').DataTable({
              processing: true,
              serverSide: true,
              ajax: '{{ route('chapters.index') }}',
              columns: [
                  { data: 'id', name: 'id' },
                  { data: 'name', name: 'name' },
                  { data: 'sticky', name: 'sticky' },
                  { data: 'status', name: 'status' },
                  { data: 'created_at', name: 'created_at' }
              ]
          });
      });
  </script>
  <style>
    .img-thumbnail{max-width: 100px;}
    .table th:nth-child(3), .table td:nth-child(3){text-align: center;}
  </style>
@endsection