@extends('layouts.app')

@section('seo_title', 'Đọc truyện tranh online - Truyện gì cũng có - TruyentranhFc')
@section('seo_keywords', 'Đọc truyện tranh online, Truyện tranh, Truyện hành động')
@section('seo_description', '❶❶✅ Web đọc truyện tranh online lớn nhất được cập nhật liên tục mỗi ngày - Cùng tham gia đọc truyện và thảo luận với hơn ✅1 triệu thành viên tại TruyentranhFc')

@section('sliders')
  @if(!empty($show_slider) && count($show_slider) > 0)
    <section id="slider_top" class="bg-main-section">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h3 class="tilte-update">Truyện hot mới ra lò</h3>
          </div>
          <div class="home-sliders col-md-12">
            @foreach($show_slider as $book)
              @if(count($book->chapters) > 0)
              <div class="hot-manga col-md-12 topfixpadd">
                <div class="thumbnails">
                  <a href="{{ url($book->slug) }}" class="slick-item">
                    @if(!empty($book->image))
                      <img class="pr-2" src="{!! asset(PATH_IMAGE_THUMBNAIL_BOOK.$book->image) !!}" alt="{{ $book->name }}" />
                    @endif
                    <h3 class="manga-title">{{ $book->name }}</h3>
                  </a>
                </div>
                <div class="caption">
                  @foreach($book->chapters as $chapter)
                    @if ($loop->iteration > 1)
                      @break
                    @endif
                    <p class="chapter">
                      <a href="{{ route('front.books.showdetail', ['chapter_slug' => $chapter->slug]) }}" title="{{ $chapter->name }}" class="Chapter">{{ $chapter->episodes }}</a></p>
                  @endforeach
                </div>
              </div>
              @endif
            @endforeach
          </div>
        </div>
      </div>
    </section>
  @endif
@endsection
@section('content')
<div class="wraper-content">
  <h3 class="title-body">Truyện mới đăng</h3>
  <div class="row">
    @foreach($books_new as $book)
      <div class="col-xs-12 col-md-6">
        <div class="media mainpage-manga mt-0">
          <a href="{{ url($book->slug) }}" class="tooltips">
            @if(!empty($book->image))
              <img class="pr-2" src="{!! asset(PATH_IMAGE_THUMBNAIL_BOOK.$book->image) !!}" alt="{{ $book->name }}" />
            @endif
            <span>
              <img src="{{ PATH_IMAGE_FRONTEND.'callout.gif' }}" class="callout" alt="callout"/>
              <div class="description">
                <strong>Tên khác:</strong>{{ $book->name_dif }}<br />
                <strong>Thể loại: </strong>
                @php
                  if(!empty($book->categories)){
                  $html = '';
                  foreach( $book->categories as $id){
                    $html .= array_get($categories, $id).', ';
                  }
                  echo rtrim($html, ', ');
                 }
                @endphp
                <br />
                <strong>Tác giả:</strong>{{ $book->author }}<br />
                <strong>Nội dung:</strong>{!! Str::words($book->content, 40,'...') !!}
              </div>
             </span>
          </a>
          <div class="media-body">
            <h4 class="manga-newest"><a href="{{ url($book->slug) }}">{{ $book->name }}</a></h4>
            <p class="description">
              <strong>Tên khác:</strong>{{ $book->name_dif }}<br />
              <strong>Thể loại: </strong>
              @php
                if(!empty($book->categories)){
                $html = '';
                foreach( $book->categories as $id){
                  $html .= "<a href='#'>".array_get($categories, $id)."</a>, ";
                }
                echo rtrim($html, ', ');
               }
              @endphp
              <br />
              <strong>Tác giả:</strong>{{ $book->author }}<br />
              <strong>Nội dung:</strong>{!!  Str::words($book->content, 20,'...') !!}
            </p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <h3 class="title-body">Truyện mới nhất</h3>
  <div class="row">
    @foreach($books_update as $book)
      <div class="col-xs-12 col-lg-6">
        <div class="media mainpage-manga mt-0">
          <a href="{{ url($book->slug) }}" class="tooltips">
            @if(!empty($book->image))
              <img class="pr-2" src="{!! asset(PATH_IMAGE_THUMBNAIL_BOOK.$book->image) !!}" alt="{{ $book->name }}" />
            @endif
            <span>
              <img src="{{ PATH_IMAGE_FRONTEND.'callout.gif' }}" class="callout" alt="callout"/>
              <div class="description">
                <strong>Tên khác:</strong>{{ $book->name_dif }}<br />
                <strong>Thể loại: </strong>
                @php
                  if(!empty($book->categories)){
                  $html = '';
                  foreach( $book->categories as $id){
                    $html .= array_get($categories, $id).', ';
                  }
                  echo rtrim($html, ', ');
                 }
                @endphp
                <br />
                <strong>Tác giả:</strong>{{ $book->author }}<br />
                <strong>Nội dung:</strong>{!!  Str::words($book->content, 20,'...') !!}
              </div>
            </span>
          </a>
          
          <div class="media-body">
            <h4 class="manga-newest"><a href="{{ url($book->slug) }}">{{ $book->name }}</a></h4>
            <div class="row">
              <div class="col-12">
                <ul class="hotup-list list-unstyled clearfix">
                  @if(count($book->chapters) > 0 )
                    @foreach( $book->chapters as $chapter)
                      @if ($loop->iteration > 8)
                        @break
                      @endif
                      <li><a class="latest-chap" href="{{ route('front.books.showdetail', ['chapter_slug' => $chapter->slug]) }}" target="_blank" title="{{$chapter->name}}">{{$chapter->episodes}}</a></li>
                    @endforeach
                  @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
      <div class="col-12">
        <div class="viewmore-button">
          <a href="{{ route('front.categories.showall') }}" title="Xem thêm">Xem thêm <i class="fa fa-arrow-right"></i></a>
        </div>
      </div>
  </div>
</div>

@endsection