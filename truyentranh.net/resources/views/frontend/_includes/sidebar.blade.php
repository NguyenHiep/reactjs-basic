<nav id="sidebar">
  <div class="col-12">
    <div class="row">
      <div class="col-6">
        <h3 class="cate-title">Thể loại</h3>
      </div>
      <div class="col-6">
        <div class="cate-total"><a href="{{ route('front.categories.showall') }}">Xem tất cả <span> ({{ $total_book }})</span></a></div>
      </div>
    </div>
    <div class="category">
      <div class="row">
        @if (count($categories) > 0)
         @foreach($categories as $category)
            <div class="col-6">
              <a href="{{ url("/the-loai/".$category->slug) }}" title="{{ $category->name }}"> {{ $category->name }}<span> ({{ $category->books_count }})</span></a>
            </div>
         @endforeach
        @endif
      </div>
    </div>
  </div>

</nav>