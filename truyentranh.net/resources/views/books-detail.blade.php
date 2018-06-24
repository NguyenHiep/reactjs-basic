@extends('layouts.app')

@section('seo_title', $chapter->seo_title ?? __('common.seo_title_chapter', ['title' => $chapter->name]))
@section('seo_keywords', $chapter->seo_keywords ?? __('common.seo_keywords', ['title' => $chapter->name]))
@section('seo_description', $chapter->seo_description ?? __('common.seo_description', ['title' => $chapter->name]))

@section('content')
<div class="breadcrumb-contain">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb">
          <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
          <li><a href="{{ route('front.books.show', ['book_slug' => $chapter->book_slug]) }}" title="{{ $chapter->book_name }}">{{ $chapter->book_name }}</a></li>
          <li><a href="javascript:;" title="{{ $chapter->name }}"> {{ $chapter->name }}</a>
          </li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section id="chapter_detail">
  <div class="container">
    <div class="wraper-content">
      <div class="row chapter-toolbar">
        <div class="col-md-7 col-sm-6">
          <h1 class="chapter-title">{{ ucfirst($chapter->name) }}</h1>
        </div>
        <div class="col-sm-6 col-md-5 col-lg-5 paddfixboth">
          <div class="chapter-control">
            <div class="row">
              <div class="col-2 paddfixboth">
                @if(!empty($previous))
                <a href="{{ route('front.books.showdetail', ['chapter_slug' => $previous->slug]) }}" title="{{$previous->name}}" class="LeftArrow">
                  <img src="{{ asset(PATH_IMAGE_FRONTEND.'arrowleft.jpg') }}" alt="leftarrow">
                </a>
                @endif
              </div>
              <div class="col-8 paddselectfix">
                <select class="dropdown-manga" data-placeholder="Chọn chương truyện" rel="chap-select">
                  <optgroup label="Tổng hợp">
                    @if(isset($list_chapters))
                    @foreach($list_chapters as $objchapter)
                      @php $selected = ($chapter->slug === $objchapter->slug) ?  'selected' : ''; @endphp
                      <option value="{{ route('front.books.showdetail', ['chapter_slug' => $objchapter->slug])}}" {{ $selected }}>{{ $objchapter->name }}</option>
                    @endforeach
                    @endif
                  </optgroup>
                </select>
              </div>
              <div class="col-2 paddfixboth rightalign">
                @if(!empty($next))
                  <a href="{{ route('front.books.showdetail', ['chapter_slug' => $next->slug]) }}" title="{{$next->name}}" class="RightArrow">
                    <img src="{{ asset(PATH_IMAGE_FRONTEND.'arrowright.jpg') }}" alt="rightarrow">
                  </a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="die-linknd text-center">
            <button type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="btn-diepage"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Báo lỗi chương
            </button>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
         <div class="chapter-content">
           @if(count($chapter) > 0)
             {!! $chapter->content !!}
           @endif
         </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="die-linknd text-center">
            <button type="button" data-toggle="modal" data-target="#boxReport" class="btn-diepage"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Báo lỗi chương
            </button>
            <div class="modal fade bs-example-modal-sm" id="boxReport">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form name="report-form" id="report-form" method="POST" action="{{ route('front.report.chapter',['chapter_slug' => $chapter->slug])}}">
                    {{ csrf_field() }}
                    {{ Form::hidden('book_id', $chapter->book_id) }}
                    {{ Form::hidden('chapter_id', $chapter->id) }}
                    <div class="modal-header">
                      <h4 id="gridSystemModalLabel" class="modal-title">Báo lỗi chương</h4>
                      <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                      @php $key = 'content' @endphp
                      <textarea rows="3" name="{{$key}}" placeholder="Mô tả lỗi" class="form-link">{{old($key)}}</textarea>
                      @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                      {{ Form::capcha('capcha') }}
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-green">Gửi thông báo</button>
                      <button type="button" data-dismiss="modal" class="btn btn-default btn-close-modal">Đóng</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row chapter-toolbar">
        <div class="col-md-7 col-sm-6">
          <h2 class="chapter-title">{{ $chapter->name }}</h2>
        </div>
        <div class="col-sm-6 col-md-5 col-lg-5 paddfixboth">
          <div class="chapter-control">
            <div class="row">
              <div class="col-2 paddfixboth">
                @if(!empty($previous))
                  <a href="{{ route('front.books.showdetail', ['chapter_slug' => $previous->slug]) }}" title="{{$previous->name}}" class="LeftArrow">
                    <img src="{{ asset(PATH_IMAGE_FRONTEND.'arrowleft.jpg') }}" alt="leftarrow">
                  </a>
                @endif
              </div>
              <div class="col-8 paddselectfix">
                <select class="dropdown-manga" data-placeholder="Chọn chương truyện" rel="chap-select">
                  <optgroup label="Tổng hợp">
                    @if(isset($list_chapters))
                      @foreach($list_chapters as $objchapter)
                        @php $selected = ($chapter->slug === $objchapter->slug) ?  'selected' : ''; @endphp
                        <option value="{{ route('front.books.showdetail', ['chapter_slug' => $objchapter->slug])}}" {{ $selected }}>{{ $objchapter->name }}</option>
                      @endforeach
                    @endif
                  </optgroup>
                </select>
              </div>
              <div class="col-2 paddfixboth rightalign">
                @if(!empty($next))
                  <a href="{{ route('front.books.showdetail', ['chapter_slug' => $next->slug]) }}" title="{{$next->name}}" class="RightArrow">
                    <img src="{{ asset(PATH_IMAGE_FRONTEND.'arrowright.jpg') }}" alt="rightarrow">
                  </a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
