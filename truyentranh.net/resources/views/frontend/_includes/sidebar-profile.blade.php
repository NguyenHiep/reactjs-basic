<nav id="sidebar-profile">
  <h1 class="title-user">
    @php $avatar = (Auth::user()->avatar) ? asset(PATH_AVATAR_THUMBNAIL . Auth::user()->avatar) : asset(PATH_IMAGE_DEFAULT); @endphp
    <span>
      <img src="{{ $avatar }}" alt="{{ Auth::user()->name }}" class="img-circle">
    </span> {{ Auth::user()->fullname ?? Auth::user()->name }}</h1>
  <ul class="list-control">
    <li><a href="{{ route('front.profile.follow') }}" {!!  (\App\Helpers\Helpers::sys_route_name() == 'front.profile.follow') ? 'class="active"' : '' !!}>Truyện theo dõi</a></li>
    <li><a href="{{ route('front.profile.edit') }}" {!! (\App\Helpers\Helpers::sys_route_name() == 'front.profile.edit') ? 'class="active"' : '' !!}>Thay đổi thông tin</a></li>
    <li><a href="{{ route('front.profile.changepassword') }}" {!! (\App\Helpers\Helpers::sys_route_name() == 'front.profile.changepassword') ? 'class="active"' : '' !!}>Đổi mật khẩu</a></li>
    <li><a href="{{ route('front.profile.notification') }}" {!! (\App\Helpers\Helpers::sys_route_name() == 'front.profile.notification') ? 'class="active"' : '' !!}>Thông báo</a></li>
  </ul>
</nav>