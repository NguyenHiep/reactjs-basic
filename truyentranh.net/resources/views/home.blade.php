@extends('layouts.app')

@section('content')
<section id="slider_top" class="update-list slider-fixtop">
  <div class="container">
    <div class="row mt-5">
      <div class="home-sliders">
        @for($i = 1; $i <=12; $i++ )
          <div class="hot-manga">
            <div class="thumbnails"><a href="http://truyentranh.net/This-Man" title="This Man" data-tt="#truyenhot-31488" tabindex="-1"><img src="http://cdn.truyentranh.net/upload/image/comic/20180505/This-Man-5aeddc4ecf9ba-thumbnail-176x264.jpg" alt="This Man"></a></div>
            <div class="caption">
              <a href="http://truyentranh.net/This-Man" tabindex="-1">
                <h3 class="manga-title">This Man</h3>
              </a>
              <a href="http://truyentranh.net/This-Man/Chap-003" title="This Man Chap 003" class="Chapter" data-tt="#truyenhot-31488" tabindex="-1">
                <p class="chapter">This Man Chap 003 </p>
              </a>
            </div>
          </div>
        @endfor
      </div>
    </div>
  </div>
</section>
@endsection
