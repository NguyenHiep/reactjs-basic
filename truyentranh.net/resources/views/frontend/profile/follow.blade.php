@extends('layouts.app')

@php $title_seo = 'Danh sách truyện theo dõi' @endphp
@section('seo_title', $title_seo.' | Đọc truyện tranh online | truyentranhfc.com')
@section('seo_keywords', $title_seo.', Đọc truyện tranh online, One Piece, Hiệp khách giang hồ, Fairy Tail, Naruto, Bleach, Toriko,...')
@section('seo_description', $title_seo.', Đọc truyện tranh online mới nhất, nhanh nhất như One Piece, Hiệp khách giang hồ, Fairy Tail, Naruto, Bleach, Toriko,..')

@section('content')
  <div class="breadcrumb-contain">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li><a href="javascript:;" title="Truyện theo dõi"> Truyện theo dõi</a>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        @includeIf('frontend._includes.sidebar-profile')
      </div>
      <div class="col-md-9">
        <h3 class="title-control">Truyện theo dõi</h3>
        <div class="row">
          <div class="col-md-12">
            @if(!empty($books))
              @foreach($books as $book)
                <div class="media media-followuser">
                  @if(!empty($book->image))
                    <div class="media-left">
                      <a href="{{ route('front.books.show', ['book_slug' => $book->slug]) }}"><img src="{!! asset(PATH_IMAGE_THUMBNAIL_BOOK.$book->image) !!}" alt="{{ $book->name }}" class="image_follow"/></a>
    
                    </div>
                  @endif
                  <div class="media-body">
                    <a href="{{ route('front.books.show', ['book_slug' => $book->slug]) }}" title="{{ $book->name }}">
                      <h4 class="manga-newest">{{ $book->name }}</h4></a>
                    <div class="description-user">
                      <span>Tên khác:</span> {{ $book->name_dif }}<br>
                      <span>Thể loại:</span>
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
                      <span>Tác giả:</span> {{ $book->author }}<br/>
                      <span>Cập nhật:</span>
                      @if(count($book->chapters) > 0)
                        @foreach( $book->chapters as $chapter)
                          @if ($loop->iteration > 1) @break @endif
                          <a href="{{ route('front.books.showdetail', ['chapter_slug' => $chapter->slug]) }}" title="{{$chapter->name}}" target="_blank">{{ ucfirst($chapter->name) }}
                          </a>
                        @endforeach
                      @else
                        <span>Đang cập nhật</span>
                      @endif
                    </div>
                  </div>
                </div>
              @endforeach
            @else
              <p>Hiện tại chưa có truyện theo dõi</p>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="pagelistcate pull-left">
              {{ $books->appends(request()->query())->links()  }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
