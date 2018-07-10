@extends('layouts.app')

@section('seo_title', 'Lịch sử đọc truyện của bạn'. request()->get('q'))
@section('seo_keywords', 'Đọc truyện tranh online, Truyện tranh, Truyện hành động')
@section('seo_description', '❶❶✅ Web đọc truyện tranh online lớn nhất được cập nhật liên tục mỗi ngày - Cùng tham gia đọc truyện và thảo luận với hơn ✅1 triệu thành viên tại TruyentranhFc')

@section('breadcrumb')
    <div class="breadcrumb-contain">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                        <li><a href="javascript:;" title="Danh sách truyện">Lịch sử đọc truyện</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="wraper-content">
        <h1 class="title-cate">Lịch sử đọc truyện của bạn</h1>
        <div class="row">
            <div class="col-md-12">
                @if(count($books) > 0)
                    @foreach($books as $book)
                        <div class="media media-followuser">
                            <div class="media-left">
                                <a href="{{ route('front.books.show', ['book_slug' => $book->slug]) }}">
                                    <img src="{!! asset(PATH_IMAGE_THUMBNAIL_BOOK.$book->image) !!}" alt="{{ $book->name }}" class="image_follow"/>
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="{{ route('front.books.show', ['book_slug' => $book->slug]) }}" title="{{ $book->name }}">
                                    <h4 class="manga-newest">{{ $book->name }}</h4>
                                </a>
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
                                    <span>Chương:</span>
                                    <a href="{{ route('front.books.showdetail', ['chapter_slug' => $book->chapter_slug]) }}" title="{{$book->chapter_name}}" target="_blank">{{ ucfirst($book->chapter_name) }} </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Đang cập nhật!</p>
                @endif
            </div>
        </div>
        @if(count($books) > 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="pagelistcate">
                        {{ $books->appends(request()->query())->links()  }}
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
