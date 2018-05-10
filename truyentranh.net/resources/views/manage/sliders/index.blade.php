@extends('layouts.manage')
@section('content')
  <div id="main">
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="fa fa-home"></i> Trang quản trị</a></li>
      <li class="active"><a href="{{ route('sliders.index') }}">Slider</a></li>
    </ol>
    <div class="col-xs-12">
      <form id="admin-form" method="post" action="" role="form">
        <div class="col-xs-12">
          <div class="form-group">
            <!-- Single button -->
            <div class="btn-group">
              <select id="task" name="task" class="form-control">
                <option>Tác vụ</option>
                <option value="delete">Xóa</option>
                <option value="deactive">Ẩn</option>
                <option value="active">Hiện</option>
              </select>
            </div>
            <a href="{{ route('sliders.create') }}" class="btn btn-submit"><small><i class="fa fa-plus"></i></small> Thêm mới</a>
            <div class="btn-group pull-right hidden-xs" id="div-search">
              <input id="search" name="search" type="text" value="" class="form-control" placeholder="Tìm kiếm">
              <span class="fa fa-search"></span>
            </div>
          </div>
          <table class="table table-bordered table-hover">
            <thead>
            <tr>
              <th><input id="check_all" type="checkbox"></th>
              <th class="hidden-xs">ID</th>
              <th>Hình ảnh</th>
              <th class="hidden-sm hidden-xs">Nội dung</th>
              <th class="hidden-xs">Vị trí</th>
              <th>Sửa</th>
              <th>Tình trạng</th>
            </tr>
            </thead>
            <tbody>
            @if(count($records) > 0)
              @foreach($records as $record)
                <tr>
                  <td>
                    <input name="id[]" type="checkbox" value="{{ $record->id }}">
                  </td>
                  <td class="hidden-xs">{{ $record->id }}</td>
                  <td>
                    <a href="{{ route('sliders.show',$record->id) }}"><img class="img-thumbnail" src="{{ asset('assets/manage/uploads/images/1.jpg') }}" alt=""></a>
                  </td>
                  <td class="hidden-sm hidden-xs">{!! Str::words($record->content, 7,'...')  !!}</td>
                  <td class="hidden-xs">{{ $record->position }}</td>
                  <td>
                    <a href="{{ route('sliders.show',$record->id) }}"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Sửa slide"></i></a>
                  </td>
                  <td>
                    <i class="fa fa-check  @if( $record->status == 1) text-success @else text-danger @endif" data-toggle="tooltip" data-placement="top" title="@if( $record->status == 1) Đang hiển thị @else Đã ẩn với người dùng @endif"></i>
                  </td>
                </tr>
              @endforeach
            @endif
           {{-- <tr>
              <td>
                <input name="id[]" type="checkbox" value="1">
              </td>
              <td class="hidden-xs">1</td>
              <td>
                <a href="new-slider.html"><img class="img-thumbnail" src="../uploads/images/1.jpg" alt=""></a>
              </td>
              <td class="hidden-sm hidden-xs">Đoạn nội dung trình bày trên slider 1</td>
              <td class="hidden-xs">Trang sản phẩm</td>
              <td>
                <a href="new-slider.html"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Sửa slide"></i></a>
              </td>
              <td>
                <i class="fa fa-check text-success" data-toggle="tooltip" data-placement="top" title="Đang hiển thị"></i>
              </td>
            </tr>
            <tr>
              <td>
                <input name="id[]" type="checkbox" value="2">
              </td>
              <td class="hidden-xs">2</td>
              <td>
                <a href="new-slider.html"><img class="img-thumbnail" src="../uploads/images/2.jpg" alt=""></a>
              </td>
              <td class="hidden-sm hidden-xs">Đoạn nội dung trình bày trên slider 2</td>
              <td class="hidden-xs">Trang chủ</td>
              <td>
                <a href="new-slider.html"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Sửa slide"></i></a>
              </td>
              <td>
                <i class="fa fa-check text-success" data-toggle="tooltip" data-placement="top" title="Đang hiển thị"></i>
              </td>
            </tr>
            <tr>
              <td>
                <input name="id[]" type="checkbox" value="3">
              </td>
              <td class="hidden-xs">3</td>
              <td>
                <a href="new-slider.html"><img class="img-thumbnail" src="../uploads/images/3.jpg" alt=""></a>
              </td>
              <td class="hidden-sm hidden-xs">Đoạn nội dung trình bày trên slider 3</td>
              <td class="hidden-xs">Trang sản phẩm</td>
              <td>
                <a href="new-slider.html"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Sửa slide"></i></a>
              </td>
              <td>
                <i class="fa fa-times text-danger" data-toggle="tooltip" data-placement="top" title="Đã ẩn với người dùng"></i>
              </td>
            </tr>
            <tr>
              <td>
                <input name="id[]" type="checkbox" value="4">
              </td>
              <td class="hidden-xs">4</td>
              <td>
                <a href="new-slider.html"><img class="img-thumbnail" src="../uploads/images/4.jpg" alt=""></a>
              </td>
              <td class="hidden-sm hidden-xs">Đoạn nội dung trình bày trên slider 4</td>
              <td class="hidden-xs">Trang chủ</td>
              <td>
                <a href="new-slider.html"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Sửa slide"></i></a>
              </td>
              <td>
                <i class="fa fa-times text-danger" data-toggle="tooltip" data-placement="top" title="Đã ẩn với người dùng"></i>
              </td>
            </tr>--}}
            </tbody>
          </table>
          <div class="text-right">
            <ul class="pagination" id="step5">
              <li class="disabled"><span>«</span></li>
              <li class="active"><span>1</span></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">»</a></li>
            </ul>
          </div>
          <p><strong><i class="fa fa-bookmark"></i>Ghi chú: </strong></p>
          <p class="note-items"><i class="fa fa-check text-success"></i> Hiển thị với người dùng.</p>
          <p class="note-items"><i class="fa fa-times text-danger"></i> Ẩn với người dùng</p>
        </div>
      </form>
    </div>
  </div>
  <style>
    .img-thumbnail{max-width: 100px;}
    .table th:nth-child(3), .table td:nth-child(3){text-align: center;}
  </style>
@endsection