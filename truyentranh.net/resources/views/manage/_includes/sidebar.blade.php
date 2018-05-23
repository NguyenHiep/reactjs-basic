<div id="sidebar" role="navigation">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">
        <i class="fa fa-th"></i><span> Danh mục quản lý</span>
        <b class="fa fa-plus-sign visible-xs pull-right"></b>
      </h3>
    </div>
    <ul id="menu" class="list-group">
      <li class="list-group-item">
        <a href="{{ route('books.index') }}">
          <i class="fa fa-edit"></i> <span>Quản lý truyện</span>
        </a>
      </li>
      <li class="list-group-item">
        <a href="product.html">
          <i class="fa fa-fire"></i><span>Sản phẩm</span>
        </a>
      </li>
      <li class="list-group-item">
        <a href="{{ route('categories.index') }}">
          <i class="fa fa-bars"></i> <span>Thể loại</span>
        </a>
      </li>
      <li class="list-group-item">
        <a href="contact.html">
          <i class="fa fa-envelope-o"></i> <span>Phản hồi<span class="badge pull-right">1</span></span>
        </a>
      </li>
      <li class="list-group-item">
        <a href="{{ route('sliders.index') }}">
          <i class="fa fa-picture-o"></i> <span>Slider</span>
        </a>
      </li>
      <li class="list-group-item">
        <a href="user.html">
          <i class="fa fa-user"></i> <span>Tài khoản</span>
        </a>
      </li>
      <li class="list-group-item">
        <a href="setting.html">
          <i class="fa fa-wrench"></i> <span>Cấu hình</span>
        </a>
      </li>
    </ul>
  </div>
</div>