<nav class="navbar navbar-expand-lg navbar-light navigation-menu">
  <div class="container">
    <a class="navbar-brand" href="{{ route('front.home') }}"><img src="{{ asset('logo.png') }}" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item {{ (Route::currentRouteName() == 'front.home') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('front.home') }}">Trang chủ <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item {{ (Route::currentRouteName() == 'front.categories.showall') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('front.categories.showall') }}">Danh sách truyện</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Thể loại</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if(count($categories) > 0)
              @foreach($categories as $category)
                <a class="dropdown-item" href="{{ route('front.categories.show', ['cat_slug' => $category->slug]) }}">{{ $category->name }}</a>
              @endforeach
            @endif
          </div>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('front.books.search') }}">
        <input class="form-control mr-sm-2" name="q" type="search" placeholder="Nhập tên truyện" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
      </form>
      <ul class="list-unstyled list-inline-item ml-2 my-2 my-lg-0">
        @auth
          <li class="dropdown">
          <a href="javascript:void(0);" data-toggle="dropdown" class="user-circle" id="dLabel">
            @php $avatar = (Auth::user()->avatar) ? asset(PATH_AVATAR_THUMBNAIL . Auth::user()->avatar) : asset(PATH_IMAGE_DEFAULT); @endphp
            <img src="{{ $avatar }}" alt="{{ Auth::user()->fullname ?? Auth::user()->name }}" class="img-circle">
            {{--<b class="caret"></b><span class="norti-user">1</span>--}}
          </a>
          <ul class="usercontent dropdown-menu" id="noticePanel" role="menu" aria-labelledby="dLabel">
            <li>
              <div class="yamm-content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="welcome-contain">
                      <a href="{{ route('front.profile.edit') }}">
                        <h3 class="username">{{ Auth::user()->fullname ?? Auth::user()->namel }}</h3>
                      </a>
                      <span class="status-click">
                        <a title="Truyện theo dõi" href="{{ route('front.profile.follow') }}">Truyện theo dõi</a>
                        <a href="{{ route('front.profile.edit') }}" title="Chỉnh sửa">Chỉnh sửa</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" title="Thoát">Thoát</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>
                      </span>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-12">
                    <div class="follower-status NotificationList" id="notification-content">
                      @if(!empty($notification))
                        <div class="media media-flowuser">
                          <div class="media-left media-topfix">
                            <a href="#"><img src="{{ asset(PATH_IMAGE_DEFAULT) }}" alt="hott3" class="media-object"></a>
                          </div>
                          <div class="media-body">
                            <a href="#">
                              <h4 class="manga-newest">Fshare.vn tặng các thành viên vechai.info 1GB dung lượng tải tốc độ cao miễn phí. Tham gia ngay!</h4>
                            </a>
                            <p class="description-flow"><span class="chapter">2018-06-16 20:12:21</span></p>
                          </div>
                        </div>
                      @else
                        <p class="text-center"> Hiện tại chưa có thông báo từ quản trị viên</p>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="welcome-contain">
                      <a href="{{ route('front.profile.notification') }}" class="view-allmess" title="Xem tất cả thông báo">Xem tất cả thông báo</a>
                    </div>
                  </div>
                </div>
                
              </div>
            </li>
          </ul>
        </li>
        @else
          <li>
            <a href="{{ route('login', ['ref' => request()->fullUrl() ]) }}" class="btn btn-success">Đăng nhập</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
@if(count($chapters) > 0)
<section class="bg-post-stick">
  <div class="container">
    <div class="row">
      <div class="col-12">
        @foreach($chapters as $chapter)
          <div class="post-stick"><a href="{{ route('front.books.showdetail', ['chapter_slug' => $chapter->slug]) }}" title="{{ $chapter->name }}">{{$chapter->name }} <img src="{{ asset(PATH_IMAGE_FRONTEND.'hot.gif') }}" /></a>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endif