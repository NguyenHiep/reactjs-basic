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
      <form id="admin-form" class="form-horizontal col-xl-9 col-lg-10 col-md-12 col-sm-12" method="post" action="{{ route('books.update', [ 'id' => $record->id]) }}" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        {{ Form::hidden('_method','PUT' ) }}
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <a class="btn btn-warning" href="{{ route('books.index') }}"><small><i class="fa fa-reply"></i></small> Trở về</a>
            <a href="{{ route('chapters.index',['mode' => 'list_filter',  'book_id' => $record->id]) }}" class="btn btn-primary"><small><i class="fa fa-list"></i></small>Danh sách chương</a>
            <a href="{{ route('chapters.create',['book_id' => $record->id]) }}" class="btn btn-primary"><small><i class="fa fa-plus"></i></small>Thêm chương mới</a>
            <button type="submit" class="btn btn-submit"><small><i class="fa fa-plus"></i></small> Cập nhật</button>
            <button type="submit" class="btn btn-danger"><small><i class="fa fa-save"></i></small>Lưu nháp</button>
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
        @php $key = 'categories'; @endphp
        <div class="form-group">
          <label class="col-sm-2 control-label required">Thể loại</label>
          <div class="col-sm-10">
            <div class="btn-group">
              @if(count($categories) > 0)
                <ul class="list-unstyled">
                  @foreach($categories as $id => $val)
                    @if(!empty($record->{$key} && in_array($id, $record->{$key})))
                      <label for="categories{{ $loop->index }}">
                        {!! Form::checkbox('categories[]',$id, old($key, $id), ['id' => 'categories'.$loop->index]) !!} {{ $val }}
                      </label>
                    @else
                      <label for="categories{{ $loop->index }}">
                        {!! Form::checkbox('categories[]',$id, old($key), ['id' => 'categories'.$loop->index]) !!} {{ $val }}
                      </label>
                    @endif
                  @endforeach
                </ul>
              @endif
            </div>
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        <div class="form-group" >
          <label class="col-sm-2 control-label">Ảnh</label>
          <div class="col-sm-10 col-sm-offset-2">
            <ul class="nav nav-tabs" role="tablist">
              <li class="active"><a href="#img-url" role="tab" data-toggle="tab">Lấy từ URL</a></li>
              <li><a href="#img-file" role="tab" data-toggle="tab">Upload từ máy tính</a></li>
            </ul>
            <div class="tab-content">
              @php $key = 'image_link'; @endphp
              <div class="tab-pane active" id="img-url">
                <label for="url" class="col-sm-3 control-label"> Từ URL</label>
                <div class="col-sm-9">
                  {!! Form::text($key, old($key), ['class' => 'form-control', 'placeholder' => 'Đường dẫn tới hình ảnh']) !!}
                  @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                </div>
              </div>
              @php $key = 'image'; @endphp
              <div class="tab-pane" id="img-file">
                <label for="image" class="col-sm-3 control-label">Từ máy tính</label>
                <div class="col-sm-9">
                  {!! Form::file($key, ['class' => 'form-control', 'accept' => 'image/*']) !!}
                  @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                  @if(!empty($record->{$key}))
                    <img class="img-thumbnail" src="{!! asset(PATH_IMAGE_BOOK.$record->{$key}) !!}" alt="{{ $record->name }}" />
                  @endif
                </div>
              </div>
            </div>
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
        @php $key = 'content'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label required">Nội dung</label>
          <div class="col-sm-10">
            {!! Form::textarea($key,  old($key, $record->{$key}), ['class' => 'ckeditor form-control ', 'rows' => '5', 'placeholder' => 'Nhập mô tả ngắn cho truyện']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'name_dif'; @endphp
        <div class="form-group">
          <label for="name_dif" class="col-sm-2 control-label">Tên khác</label>
          <div class="col-sm-10">
            {!! Form::text($key,  old($key, $record->{$key}), ['class' => 'form-control ', 'placeholder' => 'Tên khác có hoặc không']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'author'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label">Tác giả</label>
          <div class="col-sm-10">
            {!! Form::text($key,  old($key, $record->{$key}), ['class' => 'form-control ', 'placeholder' => 'Tác giả']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'teams_translate'; @endphp
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label">Nhóm dịch</label>
          <div class="col-sm-10">
            {!! Form::text($key,  old($key, $record->{$key}), ['class' => 'form-control ', 'placeholder' => 'Nhóm dịch']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'progress';@endphp
        <div class="form-group">
          <label class="col-sm-2 control-label required">Tiến độ</label>
          <div class="col-sm-10">
            {!! Form::select($key, __('selector.progress'), old($key, $record->{$key}), ['class' => 'form-control']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'reviews';@endphp
        <div class="form-group">
          <label class="col-sm-2 control-label required">Đánh giá</label>
          <div class="col-sm-10">
            {!! Form::select($key, __('selector.reviews'), old($key, $record->{$key}), ['class' => 'form-control']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        <hr>
        @php $key = 'seo_title';@endphp
        <div class="form-group">
          <label class="col-sm-2 control-label">Tiêu đề SEO</label>
          <div class="col-sm-10">
            {!! Form::text($key, old($key, $record->{$key}), ['class' => 'form-control']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'seo_slug';@endphp
        <div class="form-group">
          <label class="col-sm-2 control-label">Slug SEO</label>
          <div class="col-sm-10">
            {!! Form::text($key, old($key, $record->{$key}), ['class' => 'form-control']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'seo_description';@endphp
        <div class="form-group">
          <label class="col-sm-2 control-label">Mô tả SEO</label>
          <div class="col-sm-10">
            {!! Form::textarea($key, old($key, $record->{$key}), ['rows' => '5', 'class' => 'form-control']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        @php $key = 'seo_keywords';@endphp
        <div class="form-group">
          <label class="col-sm-2 control-label">Từ khóa SEO</label>
          <div class="col-sm-10">
            {!! Form::text($key, old($key, $record->{$key}), ['class' => 'form-control']) !!}
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <a class="btn btn-warning" href="{{ route('books.index') }}"><small><i class="fa fa-reply"></i></small> Trở về</a>
            <a href="{{ route('chapters.index',['mode' => 'list_filter',  'book_id' => $record->id]) }}" class="btn btn-primary"><small><i class="fa fa-list"></i></small>Danh sách chương</a>
            <a href="{{ route('chapters.create',['book_id' => $record->id]) }}" class="btn btn-primary"><small><i class="fa fa-plus"></i></small>Thêm chương mới</a>
            <button type="submit" class="btn btn-submit"><small><i class="fa fa-plus"></i></small> Cập nhật</button>
            <button type="submit" class="btn btn-danger"><small><i class="fa fa-save"></i></small>Lưu nháp</button>
          </div>
        </div>
      </form>
      {{--@include('manage.books.listchaper')--}}
    </div>
  </div>
@endsection