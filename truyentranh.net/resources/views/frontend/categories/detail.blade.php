@extends('layouts.app')

@php $title_seo = '💯 ✅ Thể loại '.$category->name @endphp
@section('seo_title', $title_seo.' | Đọc truyện tranh online | yeutruyentranh.com')
@section('seo_keywords', $title_seo.', Đọc truyện tranh online, One Piece, Hiệp khách giang hồ, Fairy Tail, Naruto, Bleach, Toriko,...')
@section('seo_description', $title_seo.', Đọc truyện tranh online mới nhất, nhanh nhất như One Piece, Hiệp khách giang hồ, Fairy Tail, Naruto, Bleach, Toriko,..')

@section('breadcrumb')
  <div class="breadcrumb-contain">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="javascript:;" title="{{ $category->name }}"> {{ $category->name }}</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')
<div class="wraper-content">
  <h1 class="title-cate">{{ $category->name }}</h1>
  <div class="cate-result">
    <div class="row">
      <div class="col-md-12">
        <div class="cate-order"><span>Sắp xếp theo: </span>
          <a role="button" data-toggle="collapse" href="#collapseExample" class="{{ (empty(request()->query('sort'))) ? 'active' : '' }}" title="A-Z">A-Z</a>
          <a href="{{ route('front.categories.show', ['cat_slug' => $category->slug, 'sort' => 'most_view']) }}" class="{{ (request()->query('sort') == 'most_view') ? 'active' : '' }}" title="Xem nhiều nhất">Xem nhiều nhất</a>
          <a href="{{ route('front.categories.show', ['cat_slug' => $category->slug, 'sort' => 'most_review']) }}" class="{{ (request()->query('sort') == 'most_review') ? 'active' : '' }}" title="Điểm cao nhất">Điểm cao nhất</a>
          <a href="{{ route('front.categories.show', ['cat_slug' => $category->slug, 'sort' => 'most_new']) }}" class="{{ (request()->query('sort') == 'most_new') ? 'active' : '' }}" title="Mới nhất">Mới nhất</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div id="collapseExample" class="list-watch collapse in">
        <div class="well">
          <p>
            <a href="{{ route('front.categories.show', ['cat_slug' => $category->slug]) }}" class=" {{ (empty(request()->query('fc'))) ? 'Active' : '' }}" title="Tất cả">Tất cả</a>
            @if(count($list_filter) > 0)
              @foreach($list_filter as $sort)
                <a href="{{ route('front.categories.show', ['cat_slug' => $category->slug, 'fc' => $sort]) }}" class="{{ (request()->query('fc') == $sort) ? 'Active' : '' }}" title="{{$sort}}">{{$sort}}</a>
              @endforeach
            @endif
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="cate-manga mt-3">
    <div class="row">
      @if(count($books) > 0)
        @foreach($books as $book)
          <div class="col-xs-12 col-md-6">
            <div class="media mainpage-manga mt-0">
              <a href="{{ url($book->slug) }}" class="tooltips">
                @if(!empty($book->image))
                  <img class="pr-2" src="{!! asset(PATH_IMAGE_THUMBNAIL_BOOK.$book->image) !!}" alt="{{ $book->name }}" />
                @endif
                <div class="siblings-tooltips">
                <img src="{{ asset(PATH_IMAGE_FRONTEND.'callout.gif') }}" class="callout" alt="callout"/>
                <div class="description">
                  <strong>Tác giả:</strong>{{ $book->author }}<br />
                  <strong>Nội dung:</strong>{!! Str::words($book->content, 40,'...') !!}
                </div>
               </div>
              </a>
              <div class="media-body">
                <h4 class="manga-newest"><a href="{{ url($book->slug) }}">{{ $book->name }}</a></h4>
                <div class="description">
                  <strong>Tác giả:</strong>{{ $book->author }}<br />
                  <strong>Nội dung:</strong>{!!  Str::words($book->content, 20,'...') !!}
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @else
        <div class="col-xs-12 col-md-6">Thể loại này chưa có truyện !!</div>
      @endif
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12">
      <div class="pagelistcate">
        {{ $books->appends(request()->query())->links()  }}
      </div>
    </div>
  </div>
</div>
@endsection
