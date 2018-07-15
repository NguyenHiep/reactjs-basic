@extends('layouts.manage')
@section('content')
  <div id="main">
    <ol class="breadcrumb">
      <li><a href="{{ route('manage') }}"><i class="fa fa-home"></i> Trang quản trị</a></li>
      <li><a href="{{ route('reports.index') }}">Reports</a></li>
      <li class="active">Cập nhật report</li>
    </ol>
    <div class="col-xs-12">
      @include('manage._includes.message')
      <form id="admin-form" class="form-horizontal col-xl-9 col-lg-10 col-md-12 col-sm-12" method="post" action="{{ route('reports.update', [ 'id' => $record->id]) }}" role="form">
        {{ csrf_field() }}
        {{ Form::hidden('_method','PUT' ) }}
        @php $key = 'book_name'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label required">Tên truyện</label>
          <div class="col-sm-10">
            {!! Form::text($key,  old($key, $record->{$key}), ['class' => 'form-control ', 'placeholder' => 'Tên truyện', 'readonly']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'chapter_name'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label required">Tên chương</label>
          <div class="col-sm-10">
            {!! Form::text($key,  old($key, $record->{$key}), ['class' => 'form-control ', 'placeholder' => 'Tên chương', 'readonly']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'content'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label required">Nội dung</label>
          <div class="col-sm-10">
            {!! Form::textarea($key,  old($key, $record->{$key}), ['class' => 'form-control ', 'rows' => '5', 'placeholder' => 'Nội dung report']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'status';@endphp
        <div class="form-group">
          <label class="col-sm-2 control-label required">Trạng thái</label>
          <div class="col-sm-10">
            <label for="enable">{!! Form::radio($key, '1', old($key, ($record->{$key} == '1') ? true : null), ['id' => 'enable']) !!}Đã xử lý</label>
            <label for="disable">{!! Form::radio($key, '2', old($key, ($record->{$key} == '2') ? true : null), ['id' => 'disable']) !!}Chưa xử lý</label>
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <a class="btn btn-warning" href="{{ route('reports.index') }}"><i class="fa fa-reply"></i> Trở về</a>
            <button type="submit" class="btn btn-submit"><i class="fa fa-plus"></i> Cập nhật</button>
            <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Lưu nháp</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection