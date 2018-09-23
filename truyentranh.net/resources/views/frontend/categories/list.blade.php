@extends('layouts.app')

@section('seo_title', '💯 ✅ Danh sách truyện | Đọc truyện tranh online | yeutruyentranh.com')
@section('seo_keywords', '✅ Đọc truyện tranh online, One Piece, Hiệp khách giang hồ, Fairy Tail, Naruto, Bleach, Toriko,...')
@section('seo_description', '💯 ✅ Đọc truyện tranh online mới nhất, nhanh nhất như One Piece, Hiệp khách giang hồ, Fairy Tail, Naruto, Bleach, Toriko,..')

@section('breadcrumb')
  <div class="breadcrumb-contain">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="javascript:;" title="Danh sách truyện"> Danh sách truyện</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')
<div class="wraper-content">
  <h1 class="title-cate">Danh sách truyện</h1>
  <div class="cate-result">
    <div class="row">
      <div class="col-md-12">
        <div class="cate-order"><span>Sắp xếp theo: </span>
          <a role="button" data-toggle="collapse" href="#collapseExample" class="active" title="A-Z">A-Z</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div id="collapseExample" class="list-watch collapse in">
        <div class="well">
          <p>
            <a href="{{ route('front.categories.showall') }}" class="{{ (request()->query('fc') == null) ? 'Active' : '' }}" title="Tất cả">Tất cả</a>
            @if(count($list_filter) > 0)
              @foreach($list_filter as $sort)
                <a href="{{ route('front.categories.showall', ['fc' => $sort]) }}" class="{{ (request()->query('fc') == $sort) ? 'Active' : '' }}" title="{{$sort}}">{{$sort}}</a>
              @endforeach
            @endif
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="all-cate-manga cate-manga">
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead class="table-head">
            <tr>
              <th>STT</th>
              <th>
                <p class="place-order" id="comicname" data-order="name-desc" data-fc="fc-no" data-href="{{ route('front.categories.showall') }}">Tên truyện
                  <span id="icon_comicname" class="fa fa-caret-down"></span>
                </p>
              </th>
              <th>
                <p class="place-order" id="numberchap" data-order="chap-desc" data-fc="fc-no" data-href="{{ route('front.categories.showall') }}">Số chương
                  <span id="icon_numberchap" class="fa fa-caret-down"></span>
                </p>
              </th>
              <th>
                <p class="place-order" id="numberview" data-order="view-desc" data-fc="fc-no" data-href="{{ route('front.categories.showall') }}">Lượt xem
                  <span id="icon_numberview" class="fa fa-caret-down"></span>
                </p>
              </th>
              <th>
                <p class="place-order" id="numbervote" data-order="votepoint-desc" data-fc="fc-no" data-href="{{ route('front.categories.showall') }}">Đánh giá
                  <span id="icon_numbervote" class="fa fa-caret-down"></span>
                </p>
              </th>
              <th>
                <p class="place-order" id="comictime" data-order="time-desc" data-fc="fc-no" data-href="{{ route('front.categories.showall') }}">Thời gian
                  <span id="icon_comictime" class="fa fa-caret-down"></span>
                </p>
              </th>
            </tr>
            </thead>
            <tbody id="loader-list" style="display: none">
            <tr style="text-align: center !important">
              <td colspan="6"> <img src="{{ asset(PATH_IMAGE_FRONTEND.'loading.gif') }}" alt="loading" /></td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="row" id="loadlist">
      @if(count($books) > 0)
        @foreach($books as $book)
          <div class="col-xs-12 col-md-6">
            <div class="media mainpage-manga mt-0">
              <a href="{{ url($book->slug) }}" class="tooltips">
                @if(!empty($book->image))
                  <img class="pr-2" src="{!! asset(PATH_IMAGE_THUMBNAIL_BOOK.$book->image) !!}" alt="{{ $book->name }}" />
                @endif
                <div class="siblings-tooltips">
                  <img src="{{ asset(PATH_IMAGE_FRONTEND.'callout.gif') }}" class="callout"  alt="callout"/>
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
