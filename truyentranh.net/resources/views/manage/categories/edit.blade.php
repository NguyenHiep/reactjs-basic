@extends('layouts.manage')
@section('content')
  <div id="main">
    <ol class="breadcrumb">
      <li><a href="{{ route('manage') }}"><i class="fa fa-home"></i> Trang quản trị</a></li>
      <li><a href="{{ route('categories.index') }}">Thể loại</a></li>
      <li class="active">Cập nhật thể loại</li>
    </ol>
    <div class="col-xs-12">
      <form id="admin-form" class="form-horizontal col-xl-9 col-lg-10 col-md-12 col-sm-12" method="post" action="{{ route('categories.update', [ 'id' => $record->id]) }}" role="form">
        {{ csrf_field() }}
        {{ Form::hidden('_method','PUT' ) }}
        @php $key = 'name'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label required">Tên</label>
          <div class="col-sm-10">
            {!! Form::text($key,  old($key, $record->{$key}), ['class' => 'form-control ', 'placeholder' => 'Nội dung cho hình ảnh ( ~ 120 ký tự )']) !!}
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
            <a class="btn btn-warning" href="{{ route('categories.index') }}"><small><i class="fa fa-reply"></i></small> Trở về</a>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection