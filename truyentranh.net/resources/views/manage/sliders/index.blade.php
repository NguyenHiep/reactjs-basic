@extends('layouts.manage')
@section('content')
  <div id="main">
    <ol class="breadcrumb">
      <li><a href="{{ route('manage') }}"><i class="fa fa-home"></i> Trang quản trị</a></li>
      <li class="active">Slider</li>
    </ol>
    <div class="col-xs-12">
      @include('manage._includes.message')
      <div>
        <div class="title-block">
          <h2>Danh sách slider</h2>
          <div class="right-area">
            <ul class="list-unstyled panel-layout btn-box-01">
              <li>
                <a class="btn btn-default" data-toggle="collapse" href="#search_advanced"><small><i class="fa fa-search"></i></small> Tìm kiếm</a>
              </li>
              <li>
                <a href="{{ route('sliders.create') }}" class="btn btn-primary"><small><i class="fa fa-edit"></i></small> Thêm mới</a>
              </li>
            </ul>
            <div class="toggel-box">
              <div class="collapse toggel-btn-fade" id="search_advanced">
                <form method="GET" action="{{ route('sliders.index') }}" role="form" class="clearfix">
                  @php $key = 'search_id' @endphp
                  <div class="form-group clearfix">
                    <label class="control-label col-sm-3">Id:</label>
                    <div class="col-sm-9">
                      {!! Form::text($key, old($key), ['class' => 'form-control']) !!}
                    </div>
                  </div>
                  @php $key = 'search_content' @endphp
                  <div class="form-group clearfix">
                    <label class="control-label col-sm-3">Nội dung:</label>
                    <div class="col-sm-9">
                      {!! Form::text($key, old($key), ['class' => 'form-control']) !!}
                    </div>
                  </div>
                  @php $key = 'search_status[]' @endphp
                  <div class="form-group clearfix">
                    <label class="control-label col-sm-3">Trạng thái:</label>
                    <div class="col-sm-9">
                      <label class="checkbox-inline">{!! Form::checkbox($key, 1 , (old($key) == 1) ? true : null) !!}Hiển thị</label>
                      <label class="checkbox-inline">{!! Form::checkbox($key, 2 , (old($key) == 2) ? true : null) !!}Không hiển thị </label>
                    </div>
                  </div>
                  @php $key = 'search_created_at' @endphp
                  <div class="form-group clearfix">
                    <label class="control-label col-sm-3" for="created_at">Ngày tạo:</label>
                    <div class="col-sm-9">
                      {!! Form::date($key, old($key), ['class' => 'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group clearfix text-right">
                    <a class="btn btn-default" data-toggle="collapse" data-parent="#accordion_toolbar" href="#search_advanced"><small><i class="fa fa-window-close"></i></small>Đóng lại</a>
                    <a  class="btn btn-default" href="{{ route('sliders.index') }}">Reset</a>
                    <button class="btn btn-primary" type="submit"><small><i class="fa fa-search"></i></small>Tìm kiếm</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <form id="admin-form" method="POST" action="{{ route('sliders.index') }}" role="form" class="clearfix">
        <div class="col-xs-12">
          <div class="paging-wrap clearfix">
            <ul class="list-unstyled btn-2line-wrap">
              <li>
                <div class="btn-group">
                  <select id="task" name="task" class="form-control">
                    <option>Tác vụ</option>
                    <option value="delete">Xóa</option>
                    <option value="deactive">Ẩn</option>
                    <option value="active">Hiện</option>
                  </select>
                </div>
                <button class="btn btn-submit js-action-list-batch" type="button"><small><i class="fa fa-save"></i></small> Thực thi</button>
              </li>
            </ul>
            
            <div class="block-pagination">
              <p class="number">
                {{--<label>Hiển thị</label>--}}
                <select name="display" id="display" class="form-control w-middle">
                  <option value="10">10</option>
                  <option value="20">20</option>
                  <option value="30">30</option>
                  <option value="40">40</option>
                  <option value="50">50</option>
                </select>
                <span>Hiển thị {{ $display_from }} ~ {{ $display_to }} trong <strong>{{ $page_total }}</strong> items</span>
              </p>
              {{ $records->appends(request()->query())->links()  }}
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
              <th>Ngày tạo</th>
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
                    <a href="{{ route('sliders.edit',$record->id) }}"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Sửa slide"></i></a>
                  </td>
                  <td>
                    <i class="fa fa-check  @if( $record->status == 1) text-success @else text-danger @endif" data-toggle="tooltip" data-placement="top" title="@if( $record->status == 1) Đang hiển thị @else Đã ẩn với người dùng @endif"></i>
                  </td>
                  <td>{{ $record->created_at }}</td>
                </tr>
              @endforeach
            @endif
            </tbody>
          </table>
          <div class="text-right">{{ $records->appends(request()->query())->links()  }}</div>
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