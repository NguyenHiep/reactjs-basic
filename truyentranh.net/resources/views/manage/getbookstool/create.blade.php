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
      <form id="getbookstool" class="form-horizontal col-xl-9 col-lg-10 col-md-12 col-sm-12" method="post" action="{{ route('getbookstool.store') }}" role="form">
        {{ csrf_field() }}
        @php $key = 'leech_source_id'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label required">Chọn web</label>
          <div class="col-sm-10">
            {!! Form::select($key,__('selector.leech.source'),old($key), ['class' => 'form-control', 'placeholder' => 'Vui lòng chọn site truyện']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'leech_type'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label required">Loại</label>
          <div class="col-sm-10">
              @php $leech_type = __('selector.leech.type') @endphp
              @if(count($leech_type) > 0)
                @foreach($leech_type as $id => $val)
                  @php $active = ($id == 1) ? true : null @endphp
                  <label for="leech_type{{ $id }}">
                      {!! Form::radio($key, strval($id), (old($key) == strval($id)) ? true : $active , ['id' => 'leech_type'.$id]) !!} {{ $val }}
                  </label>
                @endforeach
              @endif
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>

        <div class="content-chapters hide">
            @php $key = 'book_id'; @endphp
            <div class="form-group">
              <label for="content" class="col-sm-2 control-label required">Chọn truyện</label>
              <div class="col-sm-10">
                {!! Form::select($key,$books,old($key), [
                'data-books-url' => route('getbookstool.ajaxbooks'),
                'class'         => 'form-control js-action-select-books',
                'id'            => 'select_books_id',
                'placeholder'   => 'Vui lòng chọn truyện',
                'style'         => 'width: 100%'
                ])
                !!}
                @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
              </div>
            </div>
            <div class="form-group" >
                <div class="col-sm-2"></div>
                <div class="col-sm-10" id="info-books-ajax"></div>
            </div>
            @php $key = 'leech_chapter_url'; @endphp
            <div class="form-group">
                <label for="content" class="col-sm-2 control-label required">Chương</label>
                <div class="col-sm-10">
                    {!! Form::textarea($key,  old($key), ['rows' => '5', 'class' => 'form-control ', 'placeholder' => 'Nhập link chương truyện muốn lấy, nhập nhiều chương bằng cách xuống dòng']) !!}
                    @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                </div>
            </div>
        </div>

        <div class="content-books hide">
            @php $key = 'leech_book_url'; @endphp
            <div class="form-group">
                <label for="content" class="col-sm-2 control-label required">Link truyện</label>
                <div class="col-sm-10">
                    {!! Form::textarea($key,  old($key), ['rows' => '5', 'class' => 'form-control ', 'placeholder' => 'Nhập link truyện muốn lấy, nhập nhiều truyện bằng cách xuống dòng, tối đa 5 truyện']) !!}
                    @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                </div>
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