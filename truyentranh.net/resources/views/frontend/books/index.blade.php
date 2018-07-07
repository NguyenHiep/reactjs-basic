@extends('layouts.app')

@section('seo_title', $book->seo_title ?? __('common.seo_title', ['title' => $book->name]))
@section('seo_keywords', $book->seo_keywords ?? __('common.seo_keywords', ['title' => $book->name]))
@section('seo_description', $book->seo_description ?? __('common.seo_description', ['title' => $book->name]))

@section('breadcrumb')
<div class="breadcrumb-contain">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb">
          <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
          <li><a href="javascript:void(0)" title="{{ $book->name }}"> {{ $book->name }}</a></li>
        </ol>
      </div>
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="wraper-content row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        <div class="media manga-detail">
          @if(!empty($book->image))
            <div class="media-left cover-detail">
              <img class="pr-2" src="{!! asset(PATH_IMAGE_THUMBNAIL_BOOK.$book->image) !!}" alt="{{ $book->name }}" />
            </div>
          @endif
          <div class="media-body">
            <h1 class="title-manga">{{ $book->name }}</h1>
            <div class="description-update">
              <span>Lượt xem:</span>{{ $book->views }}<br>
              <span>Tên khác:</span>{{ $book->name_dif }}<br>
              <span>Thể loại: </span>
              @php
                if(!empty($book->categories)){
                $html = '';
                foreach( $book->categories as $id){
                  foreach ($categories as $category){
                    if($category->id == $id){
                      $html .= '<a href="'.route('front.categories.show', ['cat_slug' => $category->slug]).'">'.$category->name.'</a>, ';
                    }
                  
                  }
                  
                }
                echo rtrim($html, ', ');
               }
              @endphp
              <br>
              <span>Tác giả:</span> {{ $book->author }}<br>
              <span>Nguồn truyện:</span> {{ $book->teams_translate }}<br>
              <span>Trạng thái:</span>  {{ __('selector.progress.'.$book->progress) }}<br>
              <span>Chương đang đọc:</span> Đang cập nhật<br>
            </div>
            @auth
              @if($book->isFollowedBy(Auth::id()))
                <a href="javascript:void(0);" id="follow" data-href="{{ route('front.ajax.followbooks') }}" data-id="{{$book->id}}" data-text="Bỏ theo dõi" title="Bỏ theo dõi" class="Following">Bỏ theo dõi</a>
              @else
                <a href="javascript:void(0);" id="follow" data-href="{{ route('front.ajax.followbooks') }}" data-id="{{$book->id}}" data-text="Theo dõi truyện" title="Theo dõi truyện" class="follow">Theo dõi truyện</a>
              @endif
            @else
              <a href="{{ route('login', ['ref' => request()->fullUrl() ]) }}" title="Theo dõi truyện" class="follow">Theo dõi truyện</a>
            @endauth
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12 mar-top">
        <div class="total-chapter">
          <h4 class="collapse-contain text-left">Nội dung</h4>
        </div>
        <div class="manga-content">
          <p id="example2" class="manga-collapse">{!! $book->content !!}</p>
        </div>
        <div class="total-chapter">
          <h4 class="collapse-contain text-left">Chương mới</h4>
          <div class="chapter-list">
            @if(count($book->chapters) > 0)
              @foreach( $book->chapters as $chapter)
                @if ($loop->iteration > 5) @break @endif
                <p>
                  <a href="{{ route('front.books.showdetail', ['chapter_slug' => $chapter->slug]) }}" title="{{$chapter->name}}" target="_blank">{{ ucfirst($chapter->name) }} <span class="date-release">{{ $chapter->created_at }}</span>
                  </a>
                </p>
              @endforeach
            @else
              <p>Đang cập nhật</p>
            @endif
          </div>
        </div>
        <div class="total-chapter">
          <h4 class="collapse-contain text-left">Danh sách chương</h4>
          <section id="examples">
            <div class="content mCustomScrollbar">
              @if(count($book->chapters) > 0)
                @foreach( $book->chapters as $chapter)
                  <p>
                    <a href="{{ route('front.books.showdetail', ['chapter_slug' => $chapter->slug]) }}" title="{{$chapter->name}}" target="_blank">{{ ucfirst($chapter->name) }} <span class="date-release">{{ $chapter->created_at }}</span>
                    </a>
                  </p>
                @endforeach
              @else
                <p>Đang cập nhật</p>
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
            <a href="{{ route('front.books.show', ['book_slug' => $book->slug]) }}" title="{{ $book->name }}">
              @if(!empty($book->image))
                <img class="pr-2" src="{!! asset(PATH_IMAGE_THUMBNAIL_BOOK.$book->image) !!}" alt="{{ $book->name }}" />
              @endif
            </a>
          </div>
          <div class="caption-anime">
            <a href="{{ route('front.books.show', ['book_slug' => $book->slug]) }}" title="{{ $book->name }}">
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
@push('scripts')
<script>

	$('#follow').click(function () {
		var item = $(this),
			data = item.data();
		item.text('Loading ...');
		$.post(data.href, {id: data.id}, function (json) {
			if (!json.data.status) {
				alert('Error!');
				item.text(data.text);
			}
			else {
				item
					.removeClass(json.data.oldclass)
					.addClass(json.data.newclass)
					.text(json.data.text)
					.data('href', json.data.href);
			}
		}, 'json');
	});

</script>
@endpush
