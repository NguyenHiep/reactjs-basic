@extends('layouts.app')

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
          <a role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="true" aria-controls="collapseExample" class="active" title="A-Z">A-Z</a>
          <a href="{{ route('front.categories.show', ['cat_slug' => $category->slug, 'sort' => 'most_view']) }}" class="" title="Xem nhiều nhất">Xem nhiều nhất</a>
          <a href="{{ route('front.categories.show', ['cat_slug' => $category->slug, 'sort' => 'most_review']) }}" class="" title="Điểm cao nhất">Điểm cao nhất</a>
          <a href="{{ route('front.categories.show', ['cat_slug' => $category->slug, 'sort' => 'most_new']) }}" class="" title="Mới nhất">Mới nhất</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div id="collapseExample" class="list-watch collapse in" aria-expanded="true" style="">
        <div class="well">
          <p>
            <a href="{{ route('front.categories.show', ['cat_slug' => $category->slug]) }}" class=" Active" title="Tất cả">Tất cả</a>
            @if(count($list_filter) > 0)
              @foreach($list_filter as $sort)
                <a href="{{ route('front.categories.show', ['cat_slug' => $category->slug, 'fc' => $sort]) }}" class="" title="{{$sort}}">{{$sort}}</a>
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
                  <img class="pr-2" src="{!! asset("uploads/thumbnail/thumbnail_".$book->image) !!}" alt="{{ $book->name }}" />
                @endif
                <span>
                <img src="http://cdn.truyentranh.net/frontend/images/callout.gif" class="callout" />
                <p class="description">
                  <strong>Tác giả:</strong>{{ $book->author }}<br />
                  <strong>Nội dung:</strong>{!! Str::words($book->content, 40,'...') !!}
                </p>
               </span>
              </a>
              <div class="media-body">
                <h4 class="manga-newest"><a href="{{ url($book->slug) }}">{{ $book->name }}</a></h4>
                <p class="description">
                  <strong>Tác giả:</strong>{{ $book->author }}<br />
                  <strong>Nội dung:</strong>{!!  Str::words($book->content, 20,'...') !!}
                </p>
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
