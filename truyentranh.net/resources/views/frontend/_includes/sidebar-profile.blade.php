<nav id="sidebar-profile">
  <h1 class="title-user">
          <span>
            <img src="http://cdn.truyentranh.net/upload//image/notification/default.png" alt="nguyenhiep" class="img-circle">
          </span> {{ Auth::user()->name ?? null }}</h1>
  <ul class="list-control">
    <li><a href="{{ route('front.profile.follow') }}">Truyện theo dõi</a></li>
    <li><a href="{{ route('front.profile.edit') }}">Thay đổi thông tin</a></li>
    <li><a href="{{ route('front.profile.changepassword') }}">Đổi mật khẩu</a></li>
    <li><a href="{{ route('front.profile.notification') }}">Thông báo</a></li>
  </ul>
</nav>