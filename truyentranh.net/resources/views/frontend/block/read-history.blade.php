<div class="col-md-12">
    <div class="block-history">
        @auth
        <div class="block-history-read">
            <p class="save-manga">
                <a role="button" data-toggle="collapse" href="#collapsehistory" aria-expanded="true" aria-controls="collapsehistory">
                    <img src="{{ asset(PATH_IMAGE_FRONTEND . 'clockfix.png') }}" alt="clock"> Xem lịch sử đọc truyện củabạn
                </a>
            </p>
        </div>
        <div id="collapsehistory" class="history-manga collapse in show">
            @if(count($book_history) > 0)
                @foreach($book_history as $book)
                    <div class="media media-smalltop">
                        <div class="media-left media-topfix">
                            <a href="{{ route('front.books.show', ['book_slug' => $book->slug]) }}"
                               title="{{ $book->name }}">
                                <img src="{!! asset(PATH_IMAGE_THUMBNAIL_BOOK.$book->image) !!}" alt="{{ $book->name }}" class="media-object"/>
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="manga-newest">
                                <a class="manga-newest" href="{{ route('front.books.show', ['book_slug' => $book->slug]) }}" title="{{ $book->name }}">{{ $book->name }}</a>
                                <a href="{{ route('front.books.showdetail', ['chapter_slug' => $book->chapter_slug]) }}" title="{{$book->chapter_name}}">
                                    <strong class="chapter"> ({{ ucfirst($book->chapter_name) }})</strong>
                                </a>
                            </h4>
                            <p class="description">
                                <strong>Thể loại:</strong>
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
                            </p>
                        </div>
                    </div>
                @endforeach
                <a href="{{ route('front.books.history') }}" class="history-more">Xem tất cả</a>
            @else
                <p class="text-center">Đang cập nhật!</p>
            @endif
        </div>
        @else
            <div class="block-history-read">
                <p class="save-manga">
                    <a href="{{ route('login', ['ref' => request()->fullUrl()]) }}">
                        <img src="{{ asset(PATH_IMAGE_FRONTEND . 'clockfix.png') }}" alt="clock"/>
                        Xem lịch sử đọc truyện của bạn
                    </a>
                </p>
            </div>
        @endauth
    </div>
</div>