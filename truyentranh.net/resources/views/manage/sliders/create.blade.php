@extends('layouts.manage')
@section('content')
  <div id="main">
    <ol class="breadcrumb">
      <li><a href="{{ route('manage') }}"><i class="fa fa-home"></i> Trang quản trị</a></li>
      <li><a href="{{ route('sliders.index') }}">Slider</a></li>
      <li class="active">Thêm slider mới</li>
    </ol>
    <div class="col-xs-12">
      <form id="admin-form" class="form-horizontal col-xl-9 col-lg-10 col-md-12 col-sm-12" method="post" action="{{ route('sliders.store') }}" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        @php $key = 'content'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label required">Nội dung</label>
          <div class="col-sm-10">
            {!! Form::textarea($key,  old($key), ['class' => 'form-control ', 'rows' => '5', 'placeholder' => 'Nội dung cho hình ảnh ( ~ 120 ký tự )']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        <div class="form-group">
          <label for="status" class="col-sm-2 control-label required">Vị trí</label>
          <div class="col-sm-10">
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-primary active">
                <input type="radio" name="status" value="1" checked=""> Trang chủ
              </label>
              <label class="btn btn-primary">
                <input type="radio" name="status" value="0"> Trang sản phẩm
              </label>
            </div>
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
              <div class="tab-pane active" id="img-file">
                <label for="image" class="col-sm-3 control-label">Từ máy tính</label>
                <div class="col-sm-9">
                  <input name="image" type="file" class="form-control" id="image" accept="image/*">
                </div>
              </div>
              <div class="tab-pane" id="img-url">
                <label for="url" class="col-sm-3 control-label"> Từ URL</label>
                <div class="col-sm-9">
                  <input name="image" type="text" value="" class="form-control" id="url" placeholder="Đường dẫn tới hình ảnh" maxlength="255">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-submit"><small><i class="fa fa-plus"></i></small> Thêm mới</button>
            <button type="submit" class="btn btn-danger"><small><i class="fa fa-save"></i></small> Lưu nháp</button>
            <a class="btn btn-warning" href="#"><small><i class="fa fa-reply"></i></small> Trở về</a>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection