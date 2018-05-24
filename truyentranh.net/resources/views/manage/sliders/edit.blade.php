@extends('layouts.manage')
@section('content')
  <div id="main">
    <ol class="breadcrumb">
      <li><a href="{{ route('manage') }}"><i class="fa fa-home"></i> Trang quản trị</a></li>
      <li><a href="{{ route('sliders.index') }}">Slider</a></li>
      <li class="active">Cập nhật slider</li>
    </ol>
    <div class="col-xs-12">
      @include('manage._includes.message')
      <form id="admin-form" class="form-horizontal col-xl-9 col-lg-10 col-md-12 col-sm-12" method="post" action="{{ route('sliders.update', [ 'id' => $record->id]) }}" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        {{ Form::hidden('_method','PUT' ) }}
        @php $key = 'title'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label required">Tiêu đề</label>
          <div class="col-sm-10">
            {!! Form::text($key,  old($key, $record->{$key}), ['class' => 'form-control ', 'placeholder' => 'Nội dung cho hình ảnh ( ~ 120 ký tự )']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'content'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label required">Nội dung</label>
          <div class="col-sm-10">
            {!! Form::textarea($key,  old($key, $record->{$key}), ['class' => 'form-control ', 'rows' => '5', 'placeholder' => 'Nội dung cho hình ảnh ( ~ 120 ký tự )']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'url'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label required">URL</label>
          <div class="col-sm-10">
            {!! Form::text($key,  old($key, $record->{$key}), ['class' => 'form-control ', 'placeholder' => 'Link liên kết']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'position'; @endphp
        <div class="form-group">
          <label for="status" class="col-sm-2 control-label required">Vị trí</label>
          <div class="col-sm-10">
            <div class="btn-group">
                <label for="home"> {!! Form::radio($key, '1', (old($key, $record->{$key}) == '1') ? true : null, ['id' => 'home']) !!}Trang chủ</label>
                <label for="product">{!! Form::radio($key, '2', (old($key, $record->{$key}) == '2') ? true : null, ['id' => 'product']) !!} Trang sản phẩm</label>
            </div>
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        <div class="form-group" >
          <label class="col-sm-2 control-label required">Ảnh</label>
          <div class="col-sm-10 col-sm-offset-2">
            <ul class="nav nav-tabs" role="tablist">
              <li class="active"><a href="#img-file" role="tab" data-toggle="tab">Upload từ máy tính</a></li>
              <li><a href="#img-url" role="tab" data-toggle="tab">Lấy từ URL</a></li>
            </ul>
            <div class="tab-content" style="margin-top: 15px; min-height: 100px;">
              @php $key = 'image_path'; @endphp
              <div class="tab-pane active" id="img-file">
                <label for="image" class="col-sm-3 control-label">Từ máy tính</label>
                <div class="col-sm-9">
                  {!! Form::file($key, ['class' => 'form-control', 'accept' => 'image/*']) !!}
                  @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                  @if(!empty($record->{$key}))
                    <img class="img-thumbnail" src="{!! asset("uploads/images/".$record->image_path) !!}" alt="{{ $record->title }}" />
                  @endif
                </div>
              </div>
              @php $key = 'image_link'; @endphp
              <div class="tab-pane" id="img-url">
                <label for="url" class="col-sm-3 control-label"> Từ URL</label>
                <div class="col-sm-9">
                  {!! Form::text($key, old($key, $record->{$key}), ['class' => 'form-control', 'placeholder' => 'Đường dẫn tới hình ảnh']) !!}
                  @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
        @php $key = 'target';@endphp
        <div class="form-group">
          <label class="col-sm-2 control-label required">Target</label>
          <div class="col-sm-10">
            {!! Form::select($key, [1=>'_blank', 2 => '_self'], old($key, $record->{$key}), ['class' => 'form-control']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'status';@endphp
        <div class="form-group">
          <label class="col-sm-2 control-label required">Trạng thái</label>
          <div class="col-sm-10">
            <label for="enable">{!! Form::radio($key, '1', (old($key, $record->{$key}) == '1') ? true : null, ['id' => 'enable']) !!}Hiển thị</label>
            <label for="disable">{!! Form::radio($key, '2', (old($key, $record->{$key}) == '2') ? true : null, ['id' => 'disable']) !!}Ẩn</label>
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-submit"><small><i class="fa fa-plus"></i></small> Thêm mới</button>
            <button type="submit" class="btn btn-danger"><small><i class="fa fa-save"></i></small> Lưu nháp</button>
            <a class="btn btn-warning" href="{{ route('sliders.index') }}"><small><i class="fa fa-reply"></i></small> Trở về</a>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection