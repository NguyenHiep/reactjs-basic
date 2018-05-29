@extends('layouts.app')

@section('content')
<section id="slider_top" class="bg-main-section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h3 class="tilte-update">Truyện hot mới ra lò</h3>
      </div>
      <div class="home-sliders col-md-12">
        @for($i = 1; $i <=12; $i++ )
          <div class="hot-manga">
            <div class="thumbnails">
              <a href="" class="slick-item">
                <img src="{{ asset('uploads/images/1527278578_c102e895a90d80cb49a9565c3b9207cd.jpg') }}" alt="This Man"/>
                <h3 class="manga-title">This Man</h3>
              </a>
            </div>
            <div class="caption">
              <a href="#" title="This Man Chap 003" class="Chapter">
                <p class="chapter"><a href="#">This Man Chap 003</a> </p>
              </a>
            </div>
          </div>
        @endfor
      </div>
    </div>
  </div>
</section>
<main id="content">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-lg-8">
        <h3 class="title-body">Truyện mới đăng</h3>
        <div class="row">
          @for($i = 1; $i <= 8; $i++)
            <div class="col-xs-12 col-md-6">
              <div class="media mainpage-manga mt-0">
                <a href={this.props.url} class="tooltips">
                  <img src=http://cdn.truyentranh.net/upload/image/comic/20180529/Vigilante-Boku-no-Hero-Academia-Illegals-5b0cb98bafa2b-thumbnail-176x264.jpg alt={this.props.title} class="pr-2" />
                  <span>
						        <img src="http://cdn.truyentranh.net/frontend/images/callout.gif" class="callout" />
                     <p class="description">
                      <strong>Tên khác:</strong>{this.props.title_en}<br />
                      <strong>Thể loại: </strong>{this.props.type}<br />
                      <strong>Tác giả:</strong>{this.props.author}<br />
                      <strong>Nội dung:</strong>{this.props.description}
                     </p>
                   </span>
                </a>
                <div class="media-body">
                  <h4 class="manga-newest"><a href={this.props.url}>{this.props.children}</a></h4>
                  <p class="description">
                    <span>Tên khác:</span>{this.props.title_en}<br />
                    <span>Thể loại: </span>{this.props.type}<br />
                    <span>Tác giả:</span>{this.props.author}<br />
                    <strong>Nội dung:</strong>{this.props.description}
                  </p>
                </div>
              </div>
            </div>
          @endfor
        </div>
        <h3 class="title-body">Truyện mới nhất</h3>
        <div class="row">
          @for($i = 1; $i <= 8; $i++)
            <div class="col-xs-12 col-md-6">
              <div class="media mainpage-manga mt-0">
                <a href={this.props.url} class="tooltips">
                  <img src=http://cdn.truyentranh.net/upload/image/comic/20180529/Vigilante-Boku-no-Hero-Academia-Illegals-5b0cb98bafa2b-thumbnail-176x264.jpg alt={this.props.title} class="pr-2"/>
                  <span>
							<img src="http://cdn.truyentranh.net/frontend/images/callout.gif" class="callout"/>
							<p class="description">
								<strong>Tên khác:</strong>{this.props.title_en}<br />
								<strong>Thể loại: </strong>{this.props.type}<br />
								<strong>Tác giả:</strong>{this.props.author}<br />
								<strong>Nội dung:</strong>{this.props.description}
							</p>
						</span>
                </a>
                <div class="media-body">
                  <h4 class="manga-newest"><a href={this.props.url} title={this.props.title} data-tt="#truyenmoi-31347">{this.props.children}</a></h4>
                  <div class="row">
                    <div class="col-12">
                      <ul class="hotup-list list-unstyled clearfix">
                        @for($j = 1; $j<=12; $j++)
                          <li key={chapter.id}><a class="latest-chap" href={chapter.url} target="_blank" title={chapter.title}>{chapter.title}</a></li>
                        @endfor
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endfor
        </div>
      </div>
      <div class="col-xs-12 col-lg-4">
        <div class="row">
          <div class="col-md-12">
            <div class="history-read">
              <p class="save-manga">
                <a href="/login">
                <img src="http://cdn.truyentranh.net/frontend/images/clockfix.png" /> Xem lịch sử đọc truyện của bạn</a>
              </p>
            </div>
          </div>
        </div>
        <div class="row">
        @include('frontend._includes.sidebar')
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
