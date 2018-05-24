@extends('layouts.manage')
@section('content')
  <div id="main">
    <ol class="breadcrumb">
      <li><a href="{{ route('manage') }}"><i class="fa fa-home"></i> Trang quản trị</a></li>
      <li><a href="{{ route('books.index') }}">Truyện</a></li>
      <li class="active">Cập nhật truyện</li>
    </ol>
    <div class="col-xs-12">
      @include('manage._includes.message')
      <form id="admin-form" class="form-horizontal col-xl-9 col-lg-10 col-md-12 col-sm-12" method="post" action="{{ route('chapters.update', [ 'id' => $record->id]) }}" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        {{ Form::hidden('_method','PUT' ) }}
        @php $key = 'book_id'; @endphp
        <div class="form-group">
          <label class="col-sm-2 control-label required">Chọn truyện</label>
          <div class="col-sm-10">
            <div class="btn-group">
              {{ Form::select($key, $books, old($key,  $record->{$key}), ['class' => 'form-control']) }}
            </div>
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'name'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label required">Tên truyện</label>
          <div class="col-sm-10">
            {!! Form::text($key,  old($key, $record->{$key}), ['class' => 'form-control ', 'placeholder' => 'Nhập tên truyện tối đa 191 ký tự']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'content'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label required">Nội dung</label>
          <div class="col-sm-10">
            {!! Form::textarea($key,  old($key, $record->{$key}), ['class' => 'form-control ', 'rows' => '5', 'placeholder' => 'Nhập mô tả ngắn cho truyện']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'sticky';@endphp
        <div class="form-group">
          <label class="col-sm-2 control-label required">Vị trí</label>
          <div class="col-sm-10">
            <label for="sticky">{!! Form::radio($key, '1', old($key, ($record->{$key} == '1') ? true : null), ['id' => 'sticky']) !!}Nổi bật</label>
            <label for="unsticky">{!! Form::radio($key, '2', old($key, ($record->{$key} == '2') ? true : null), ['id' => 'unsticky']) !!}Không nổi bật</label>
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'status';@endphp
        <div class="form-group">
          <label class="col-sm-2 control-label required">Trạng thái</label>
          <div class="col-sm-10">
            <label for="enable">{!! Form::radio($key, '1', old($key, ($record->{$key} == '1') ? true : null), ['id' => 'enable']) !!}Hiển thị</label>
            <label for="disable">{!! Form::radio($key, '2', old($key, ($record->{$key} == '2') ? true : null), ['id' => 'disable']) !!}Ẩn</label>
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-submit"><small><i class="fa fa-plus"></i></small> Thêm mới</button>
            <button type="submit" class="btn btn-danger"><small><i class="fa fa-save"></i></small> Lưu nháp</button>
            <a class="btn btn-warning" href="{{ route('books.index') }}"><small><i class="fa fa-reply"></i></small> Trở về</a>
            <a href="" class="btn btn-primary"><small><i class="fa fa-bars" data-original-title="" title=""></i></small>Thêm chương mới</a>
          </div>
        </div>
      </form>
      {{--@include('manage.books.listchaper')--}}
    </div>
  </div>
@endsection