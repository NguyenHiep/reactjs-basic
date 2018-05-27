@extends('layouts.manage')
@section('content')
  <div id="main">
    <ol class="breadcrumb">
      <li><a href="{{ route('manage') }}"><i class="fa fa-home"></i> Trang quản trị</a></li>
      <li><a href="{{ route('chapters.index') }}">Chương truyện</a></li>
      <li class="active">Thêm chương mới</li>
    </ol>
    <div class="col-xs-12">
      @include('manage._includes.message')
      <form id="admin-form" class="form-horizontal col-xl-9 col-lg-10 col-md-12 col-sm-12" method="post" action="{{ route('chapters.store') }}" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        @php $key = 'book_id'; @endphp
        <div class="form-group">
          <label class="col-sm-2 control-label required">Chọn truyện</label>
          <div class="col-sm-10">
            <div class="btn-group">
             {{ Form::select($key, $books, old($key), ['class' => 'form-control']) }}
            </div>
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'name'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label required">Tên chương</label>
          <div class="col-sm-10">
            {!! Form::text($key,  old($key), ['class' => 'form-control ', 'placeholder' => 'Nhập tên chương tối đa 191 ký tự']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'content'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label required">Nội dung chương</label>
          <div class="col-sm-10">
            {!! Form::textarea($key,  old($key), ['class' => 'ckeditor form-control ', 'rows' => '5', 'placeholder' => 'Nhập nội dung']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'sticky';@endphp
        <div class="form-group">
          <label class="col-sm-2 control-label required">Nổi bật</label>
          <div class="col-sm-10">
            <label for="sticky">{!! Form::radio($key, '1', old($key), ['id' => 'sticky']) !!}Có</label>
            <label for="unsticky">{!! Form::radio($key, '2', old($key, true), ['id' => 'unsticky']) !!}Không</label>
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'status';@endphp
        <div class="form-group">
          <label class="col-sm-2 control-label required">Trạng thái</label>
          <div class="col-sm-10">
            <label for="enable">{!! Form::radio($key, '1', old($key), ['id' => 'enable']) !!}Hiển thị</label>
            <label for="disable">{!! Form::radio($key, '2', old($key, true), ['id' => 'disable']) !!}Ẩn</label>
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-submit"><small><i class="fa fa-plus"></i></small> Thêm mới</button>
            <button type="submit" class="btn btn-danger"><small><i class="fa fa-save"></i></small> Lưu nháp</button>
            <a class="btn btn-warning" href="{{ route('chapters.index') }}"><small><i class="fa fa-reply"></i></small> Trở về</a>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection