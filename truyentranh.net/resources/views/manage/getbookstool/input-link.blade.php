@extends('layouts.manage')
@section('content')
  <div id="main">
    <ol class="breadcrumb">
      <li><a href="{{ route('manage') }}"><i class="fa fa-home"></i> Trang quản trị</a></li>
      <li><a href="{{ route('getbookstool.index') }}">Danh sách truyện leech</a></li>
      <li class="active">Leach truyện mới</li>
    </ol>
    <div class="col-xs-12">
      @include('manage._includes.message')
      <form id="admin-form" class="form-horizontal col-xl-9 col-lg-10 col-md-12 col-sm-12" method="post" action="{{ route('getbookstool.storelinkall') }}" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        @php $key = 'leech_book_url'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label required">Link truyện</label>
          <div class="col-sm-10">
            {!! Form::text($key,  old($key), ['class' => 'form-control ', 'placeholder' => 'Nhập link truyện']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-submit"><small><i class="fa fa-plus"></i></small> Leech truyện</button>
            <a class="btn btn-warning" href="{{ route('getbookstool.index') }}"><small><i class="fa fa-reply"></i></small> Trở về</a>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection