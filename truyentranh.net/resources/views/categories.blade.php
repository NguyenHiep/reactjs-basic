@extends('layouts.app')

@section('content')
<div class="wraper-content">
  <h1 class="title-cate">{{ $category->name }}</h1>
  <div class="cate-result">
    <div class="row">
      <div class="col-md-12">
        <div class="cate-order"><span>Sắp xếp theo: </span>
          <a role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="true" aria-controls="collapseExample" class="active" title="A-Z">A-Z</a>
          <a href="#" class="" title="Xem nhiều nhất">Xem nhiều nhất</a>
          <a href="#" class="" title="Điểm cao nhất">Điểm cao nhất</a>
          <a href="#" class="" title="Mới nhất">Mới nhất</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div id="collapseExample" class="list-watch collapse in" aria-expanded="true" style="">
        <div class="well">
          <p>
            <a href="http://truyentranh.net/the-loai/Action.1.html" class=" Active" title="Tất cả">Tất cả</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=A" class="" title="A">A</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=B" class="" title="B">B</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=C" class="" title="C">C</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=D" class="" title="D">D</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=E" class="" title="E">E</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=F" class="" title="F">F</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=G" class="" title="G">G</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=H" class="" title="H">H</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=I" class="" title="I">I</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=J" class="" title="J">J</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=K" class="" title="K">K</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=L" class="" title="L">L</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=M" class="" title="M">M</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=N" class="" title="N">N</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=O" class="" title="O">O</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=P" class="" title="P">P</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=Q" class="" title="Q">Q</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=R" class="" title="R">R</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=S" class="" title="S">S</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=T" class="" title="T">T</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=U" class="" title="U">U</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=V" class="" title="V">V</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=W" class="" title="W">W</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=X" class="" title="X">X</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=Y" class="" title="Y">Y</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=Z" class="" title="Z">Z</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=0" class="" title="0">0</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=1" class="" title="1">1</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=2" class="" title="2">2</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=3" class="" title="3">3</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=4" class="" title="4">4</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=5" class="" title="5">5</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=6" class="" title="6">6</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=7" class="" title="7">7</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=8" class="" title="8">8</a>
            <a href="http://truyentranh.net/the-loai/Action.1.html?fc=9" class="" title="9">9</a>
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="cate-manga mt-3">
    <div class="row">
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
