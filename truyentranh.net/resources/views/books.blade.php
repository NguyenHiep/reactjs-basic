@extends('layouts.app')

@section('content')
<div class="wraper-content">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        <div class="media manga-detail">
          <div class="media-left cover-detail">
            @if(!empty($book->image))
              <img class="pr-2" src="{!! asset("uploads/thumbnail/thumbnail_".$book->image) !!}" alt="{{ $book->name }}" />
            @endif
          </div>
          <div class="media-body">
            <h1 class="title-manga">{{ $book->name }}</h1>
            <div class="rating-online">
              <div class="row">
                <div class="col-md-3">
                  <ul class="StarRating" id="vote" data-href="http://truyentranh.net/vote.json" data-id="{{ $book->id }}" data-voted="false">
                    <li id="point-1">
                      <a href="javascript:void(0);" data-point="2" data-classes="CurrentRating One" class="OneStar">1</a>
                    </li>
                    <li id="point-2">
                      <a href="javascript:void(0);" data-point="4" data-classes="CurrentRating Two" class="TwoStars">2</a>
                    </li>
                    <li id="point-3">
                      <a href="javascript:void(0);" data-point="6" data-classes="CurrentRating Three" class="ThreeStars">3</a>
                    </li>
                    <li id="point-4">
                      <a href="javascript:void(0);" data-point="8" data-classes="CurrentRating Four" class="FourStars">4</a>
                    </li>
                    <li id="point-5" class="Active CurrentRating Five">
                      <a href="javascript:void(0);" data-point="10" data-classes="CurrentRating Five" class="FiveStars">5</a>
                    </li>
                  </ul>
                  <img src="http://cdn.truyentranh.net/images/loading.gif" id="vote-busy" style="display: none">
                
                </div>
                <div class="col-md-7 fixpadding">
                  <div class="total-rating">
                    <p><span class="VoteScore" rel="total-point">8.3</span>/10 trên tổng số <span rel="total-vote">10,278</span> lượt đánh giá</p>
                  </div>
                </div>
              </div>
            </div>
            <p class="description-update">
              <span>Lượt xem:</span>{{ $book->views }}<br>
              <span>Tên khác:</span>{{ $book->name_dif }}<br>
              <span>Thể loại: </span>
              @php
                if(!empty($book->categories)){
                $html = '';
                foreach( $book->categories as $id){
                  $html .= array_get($categories, $id).', ';
                }
                echo rtrim($html, ',');
               }
              @endphp
              <br>
              <span>Tác giả:</span> {{ $book->author }}<br>
              <span>Nguồn truyện:</span> {{ $book->teams_translate }}<br>
              <span>Trạng thái:</span>  {{ __('selector.progress.'.$book->progress) }}<br>
              <span>Chương đang đọc:</span> Đang cập nhật<br>
              <a href="{{ url('/login') }}" title="Theo dõi truyện" class="follow">Theo dõi truyện</a>
            </p>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12 mar-top">
        <div class="total-chapter">
          <p class="collapse-contain"><span class="text-left">Nội dung</span></p>
        </div>
        <div class="manga-content">
          <p id="example2" class="manga-collapse">{!! $book->content !!}</p>
        </div>
        <div class="total-chapter">
          <p class="collapse-contain"><span class="text-left">Chương mới</span></p>
          <div class="chapter-list">
            @if(!empty($book->chapters))
              @foreach( $book->chapters as $chapter)
                <p>
                  <a href="{{ url($book->slug.'/'.$chapter->slug) }}" title="{{$chapter->name}}" target="_blank">{{$chapter->name}} <span class="date-release">{{ $chapter->created_at }}</span>
                  </a>
                </p>
              @endforeach
            @endif
          </div>
        </div>
        <div class="total-chapter">
          <p class="collapse-contain"><span class="text-left">Danh sách chương</span></p>
          <section id="examples">
            <div class="content mCustomScrollbar">
              @if(!empty($book->chapters))
                @foreach( $book->chapters as $chapter)
                  <p>
                    <a href="{{ url($book->slug.'/'.$chapter->slug) }}" title="{{$chapter->name}}" target="_blank">{{$chapter->name}} <span class="date-release">{{ $chapter->created_at }}</span>
                    </a>
                  </p>
                @endforeach
              @endif
            </div>
          </section>
        </div>
      </div>
    </div>
    
    @if(count($book_related) > 0)
    <div class="row">
      <div class="col-md-12">
        <h3 class="title-body">Xem thêm</h3>
      </div>
      <div class="manga-related">
        @foreach($book_related as $book)
          <div class="col-sm-3 col-md-6 col-lg-3">
          <div class="thumbnails">
            <a href="{{ url($book->slug) }}" title="{{ $book->name }}">
              @if(!empty($book->image))
                <img class="pr-2" src="{!! asset("uploads/thumbnail/thumbnail_".$book->image) !!}" alt="{{ $book->name }}" />
              @endif
            </a>
          </div>
          <div class="caption-anime">
            <a href="{{ url($book->slug) }}" title="{{ $book->name }}s">
              <h4>{{ $book->name }}</h4>
            </a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    @endif
  </div>
</div>
@endsection
