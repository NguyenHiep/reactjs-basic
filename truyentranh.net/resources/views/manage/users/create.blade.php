@extends('layouts.manage')
@section('content')
  <div id="main">
    <ol class="breadcrumb">
      <li><a href="{{ route('manage') }}"><i class="fa fa-home"></i> Trang quản trị</a></li>
      <li><a href="{{ route('users.index') }}">Danh sách tài khoản</a></li>
      <li class="active">Tạo mới tài khoản</li>
    </ol>
    <div class="col-xs-12">
      @include('manage._includes.message')
      <form id="admin-form" class="form-horizontal col-xl-9 col-lg-10 col-md-12 col-sm-12" method="post"
            action="{{ route('users.store') }}" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
          @php $key = 'level'; @endphp
          <div class="form-group">
            <label for="content" class="col-sm-2 control-label required">Cấp bậc</label>
            <div class="col-sm-10">
              {!! Form::select($key, [1 =>'Thành viên', 2 =>'Tác giả'], old($key), ['class' => 'form-control ', 'placeholder' => 'Vui lòng chọn cấp bậc']) !!}
              @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
            </div>
          </div>
        @php $key = 'avatar'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label">Ảnh đại diện</label>
          <div class="col-sm-10">
            {!! Form::file($key, ['class' => 'form-control', 'accept' => 'image/*']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'name'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label required">Tên tài khoản</label>
          <div class="col-sm-10">
            {!! Form::text($key,  old($key), ['class' => 'form-control ', 'placeholder' => 'Tên tài khoản']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'email'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label required">Email</label>
          <div class="col-sm-10">
            {!! Form::text($key,  old($key), ['class' => 'form-control ', 'placeholder' => 'Email']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'new_password'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label">Mật khẩu mới</label>
          <div class="col-sm-10">
            {!! Form::password($key, ['class' => 'form-control ', 'placeholder' => 'Mật khẩu mới']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'fullname'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label">Tên hiển thị</label>
          <div class="col-sm-10">
            {!! Form::text($key,  old($key), ['class' => 'form-control ', 'placeholder' => 'Tên hiển thị']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'card'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label">Chứng minh thư</label>
          <div class="col-sm-10">
            {!! Form::text($key,  old($key), ['class' => 'form-control ', 'placeholder' => 'Chứng minh thư']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'phone'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label">Số điện thoại</label>
          <div class="col-sm-10">
            {!! Form::text($key,  old($key), ['class' => 'form-control ', 'placeholder' => 'Số điện thoại']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'birthday'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label">Ngày sinh</label>
          <div class="col-sm-10">
            {!! Form::text($key,  old($key), ['class' => 'form-control ', 'placeholder' => 'Ngày sinh']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'sign'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label">Chữ ký</label>
          <div class="col-sm-10">
            {!! Form::textarea($key,  old($key), ['class' => 'form-control ', 'rows' => '2', 'placeholder' => 'Chữ ký cá nhân']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'status';@endphp
        <div class="form-group">
          <label class="col-sm-2 control-label required">Trạng thái</label>
          <div class="col-sm-10">
            <label
              for="enable">{!! Form::radio($key, '1', old($key), ['id' => 'enable']) !!}
              Hiển thị</label>
            <label
              for="disable">{!! Form::radio($key, '2', old($key), ['id' => 'disable']) !!}
              Không hiển thị</label>
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>

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