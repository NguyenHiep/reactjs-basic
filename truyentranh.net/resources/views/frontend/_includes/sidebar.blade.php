<nav id="sidebar">
  <div class="col-12">
    <div class="row">
      <div class="col-6">
        <h3 class="cate-title">Thể loại</h3>
      </div>
      <div class="col-6">
        <div class="cate-total">{{--<a href="http://truyentranh.net/danh-sach.tall.html">Xem tất cả <span> (4382)</span></a>--}}</div>
      </div>
    </div>
    <div class="category">
      <div class="row">
        @if (count($categories) > 0)
         @foreach($categories as $category)
            <div class="col-6">
              <a href="{{ url("/the-loai/".$category->slug) }}" title="{{ $category->name }}"> {{ $category->name }}{{--<span> (2)</span>--}}</a>
            </div>
         @endforeach
        @endif
      </div>
    </div>
  </div>

</nav>