@extends('layouts.app')

@php $title_seo = $book->name .' '. $chapter->name @endphp
@section('seo_title', $title_seo.' | Đọc truyện tranh online | yeutruyentranh.com')
@section('seo_keywords', $title_seo.', Đọc truyện tranh online, One Piece, Hiệp khách giang hồ, Fairy Tail, Naruto, Bleach, Toriko,...')
@section('seo_description', $title_seo.', Đọc truyện tranh online mới nhất, nhanh nhất như One Piece, Hiệp khách giang hồ, Fairy Tail, Naruto, Bleach, Toriko,..')

@section('content')
<div class="breadcrumb-contain">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb">
          <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
          <li><a href="{{ url($book->slug) }}" title="{{ $book->name }}">{{ $book->name }}</a></li>
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
          <h1 class="chapter-title">{{ $chapter->name }}</h1>
        </div>
        <div class="col-sm-6 col-md-5 col-lg-5 paddfixboth">
          <div class="chapter-control">
            <div class="row">
              <div class="col-xs-2 col-lg-2 paddfixboth">
                @if(!empty($previous))
                <a href="{{ url($book->slug.'/'.$previous->slug) }}" title="{{$previous->name}}" class="LeftArrow">
                  <img src="http://cdn.truyentranh.net/frontend/images/arrowleft.jpg" alt="leftarrow">
                </a>
                @endif
              </div>
              <div class="col-xs-8 col-lg-8 paddselectfix">
                <select class="dropdown-manga" data-placeholder="Chọn chương truyện" rel="chap-select">
                  <optgroup label="Tổng hợp">
                    @if(isset($list_chapters))
                    @foreach($list_chapters as $objchapter)
                      @php $selected = ($chapter->slug === $objchapter->slug) ?  'selected' : ''; @endphp
                      <option value="{{ url($objchapter->book_slug.'/'.$objchapter->slug) }}" {{ $selected }}>{{ $objchapter->name }}</option>
                    @endforeach
                    @endif
                  </optgroup>
                </select>
              </div>
              <div class="col-xs-2 col-lg-2 paddfixboth rightalign">
                @if(!empty($next))
                  <a href="{{ url($book->slug.'/'.$next->slug) }}" title="{{$next->name}}" class="RightArrow">
                    <img src="http://cdn.truyentranh.net/frontend/images/arrowright.jpg" alt="rightarrow">
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
                  <form name="report-form" id="report-form" method="POST" action="{{ route('front.report.chapter',['book_slug' => $book->slug, 'chapter_slug' => $chapter->slug])}}">
                    {{ csrf_field() }}
                    {{ Form::hidden('book_id', $book->id) }}
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
              <div class="col-xs-2 col-lg-2 paddfixboth">
                @if(!empty($previous))
                  <a href="{{ url($book->slug.'/'.$previous->slug) }}" title="{{$previous->name}}" class="LeftArrow">
                    <img src="http://cdn.truyentranh.net/frontend/images/arrowleft.jpg" alt="leftarrow">
                  </a>
                @endif
              </div>
              <div class="col-xs-8 col-lg-8 paddselectfix">
                <select class="dropdown-manga" data-placeholder="Chọn chương truyện" rel="chap-select">
                  <optgroup label="Tổng hợp">
                    @if(isset($list_chapters))
                      @foreach($list_chapters as $objchapter)
                        @php $selected = ($chapter->slug === $objchapter->slug) ?  'selected' : ''; @endphp
                        <option value="{{ url($objchapter->book_slug.'/'.$objchapter->slug) }}" {{ $selected }}>{{ $objchapter->name }}</option>
                      @endforeach
                    @endif
                  </optgroup>
                </select>
              </div>
              <div class="col-xs-2 col-lg-2 paddfixboth rightalign">
                @if(!empty($next))
                  <a href="{{ url($book->slug.'/'.$next->slug) }}" title="{{$next->name}}" class="RightArrow">
                    <img src="http://cdn.truyentranh.net/frontend/images/arrowright.jpg" alt="rightarrow">
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
