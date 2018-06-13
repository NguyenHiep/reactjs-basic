<nav class="navbar navbar-expand-lg navbar-light navigation-menu">
  <div class="container">
    <a class="navbar-brand" href="{{ route('front.home') }}"><img src="{{ asset('logo.png') }}" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('front.home') }}">Trang chủ <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url("/danh-sach-truyen") }}">Danh sách truyện</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Thể loại</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if(count($categories) > 0)
              @foreach($categories as $category)
                <a class="dropdown-item" href="{{ url("/the-loai/".$category->slug) }}">{{ $category->name }}</a>
              @endforeach
            @endif
          </div>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('front.books.search') }}">
        <input class="form-control mr-sm-2" name="q" type="search" placeholder="Nhập tên truyện" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
      </form>
    </div>
  </div>
</nav>
@if(count($chapters) > 0)
<section class="bg-post-stick">
  <div class="container">
    <div class="row">
      <div class="col-12">
        @foreach($chapters as $chapter)
          <div class="post-stick"><a href="{{ url($chapter->book_slug.'/'.$chapter->slug) }}" title="{{ $chapter->name }}">{{$chapter->name}} <img src="http://cdn.truyentranh.net/frontend/images/hot.gif" /></a>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endif