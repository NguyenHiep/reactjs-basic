<nav id="sidebar-profile">
  <h1 class="title-user">
    @php $avatar = Auth::user()->avatar ?? 'http://cdn.truyentranh.net/upload//image/notification/default.png';@endphp
    <span>
      <img src="{{ $avatar }}" alt="nguyenhiep" class="img-circle">
    </span> {{ Auth::user()->name ?? null }}</h1>
  <ul class="list-control">
    <li><a href="{{ route('front.profile.follow') }}" {!!  (\App\Helpers\Helpers::sys_route_name() == 'front.profile.follow') ? 'class="active"' : '' !!}>Truyện theo dõi</a></li>
    <li><a href="{{ route('front.profile.edit') }}" {!! (\App\Helpers\Helpers::sys_route_name() == 'front.profile.edit') ? 'class="active"' : '' !!}>Thay đổi thông tin</a></li>
    <li><a href="{{ route('front.profile.changepassword') }}" {!! (\App\Helpers\Helpers::sys_route_name() == 'front.profile.changepassword') ? 'class="active"' : '' !!}>Đổi mật khẩu</a></li>
    <li><a href="{{ route('front.profile.notification') }}" {!! (\App\Helpers\Helpers::sys_route_name() == 'front.profile.notification') ? 'class="active"' : '' !!}>Thông báo</a></li>
  </ul>
</nav>