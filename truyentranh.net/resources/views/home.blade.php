@extends('layouts.app')

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
              <div class="hot-manga">
                <div class="thumbnails">
                  <a href="{{ url($book->slug) }}" class="slick-item">
                    @if(!empty($book->image))
                      <img class="pr-2" src="{!! asset("uploads/thumbnail/thumbnail_".$book->image) !!}" alt="{{ $book->name }}" />
                    @endif
                    <h3 class="manga-title">{{ $book->name }}</h3>
                  </a>
                </div>
                <div class="caption">
                  @if(count($book->chapters))
                    @foreach($book->chapters as $chapter)
                      <a href="{{ url($book->slug.'/'.$chapter->slug) }}" title="{{ $chapter->name }}" class="Chapter">
                        <p class="chapter"><a href="{{ url($book->slug.'/'.$chapter->slug) }}">{{ $chapter->name }}</a> </p>
                      </a>
                    @endforeach
                  @endif
                </div>
              </div>
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
              <img class="pr-2" src="{!! asset("uploads/thumbnail/thumbnail_".$book->image) !!}" alt="{{ $book->name }}" />
            @endif
            <span>
              <img src="http://cdn.truyentranh.net/frontend/images/callout.gif" class="callout" />
              <p class="description">
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
              </p>
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
      <div class="col-xs-12 col-md-6">
        <div class="media mainpage-manga mt-0">
          <a href="{{ url($book->slug) }}" class="tooltips">
            @if(!empty($book->image))
              <img class="pr-2" src="{!! asset("uploads/thumbnail/thumbnail_".$book->image) !!}" alt="{{ $book->name }}" />
            @endif
            <span>
              <img src="http://cdn.truyentranh.net/frontend/images/callout.gif" class="callout"/>
              <p class="description">
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
              </p>
            </span>
          </a>
          <div class="media-body">
            <h4 class="manga-newest"><a href="{{ url($book->slug) }}">{{ $book->name }}</a></h4>
            <div class="row">
              <div class="col-12">
                <ul class="hotup-list list-unstyled clearfix">
                  @if(!empty($book->chapters))
                    @foreach( $book->chapters as $chapter)
                      <li><a class="latest-chap" href="{{ url($book->slug.'/'.$chapter->slug) }}" target="_blank" title="{{$chapter->name}}">{{$chapter->name}}</a></li>
                    @endforeach
                  @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
