@extends('layouts.manage')
@section('title_page', 'Cấu hình hệ thống')
@section('content')
  <div id="main">
    <ol class="breadcrumb">
      <li><a href="{{ route('manage') }}"><i class="fa fa-home"></i> Trang quản trị</a></li>
      <li><a href="{{ route('configsystem.index') }}">Cấu hình hệ thống</a></li>
      <li class="active">Tạo mới cấu hình hệ thống</li>
    </ol>
    <div class="col-xs-12">
      @include('manage._includes.message')
      <form id="admin-form" class="form-horizontal col-xl-9 col-lg-10 col-md-12 col-sm-12" method="post" action="{{ route('configsystem.store') }}" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        <h3>Cấu hình site</h3>
        @php $key = 'language_id'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label">Chọn ngôn ngữ</label>
          <div class="col-sm-10">
            {!! Form::select($key,  ['1' => 'Tiếng việt', '2' => 'Tiếng anh', '3' => 'Tiếng nhật'], '1', ['class' => 'form-control']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
          @php $key = 'robot_content'; @endphp
          <div class="form-group">
            <label for="content" class="col-sm-2 control-label">Robot content</label>
            <div class="col-sm-10">
              {!! Form::textarea($key,  old($key), ['class' => 'form-control ', 'rows' => '5', 'placeholder' => 'Robot content']) !!}
              @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
            </div>
          </div>
          @php $key = 'custom_css'; @endphp
          <div class="form-group">
            <label for="content" class="col-sm-2 control-label">Custom css</label>
            <div class="col-sm-10">
              {!! Form::textarea($key,  old($key), ['class' => 'form-control ', 'rows' => '5', 'placeholder' => 'Custom css']) !!}
              @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
            </div>
          </div>
          @php $key = 'custom_script'; @endphp
          <div class="form-group">
            <label for="content" class="col-sm-2 control-label">Custom script</label>
            <div class="col-sm-10">
              {!! Form::textarea($key,  old($key), ['class' => 'form-control ', 'rows' => '5', 'placeholder' => 'Custom script']) !!}
              @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
            </div>
          </div>
        <h3>Cấu hình SEO</h3>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <a class="btn btn-warning" href="{{ route('users.index') }}"><i class="fa fa-reply"></i> Trở về</a>
            <button type="submit" class="btn btn-submit"><i class="fa fa-plus"></i> Thêm mới</button>
            <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Lưu nháp</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection