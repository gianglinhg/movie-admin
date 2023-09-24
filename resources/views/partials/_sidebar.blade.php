<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item nav-category">Phim</li>
    <li class="nav-item {{ request()->is('movies') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('movies')}}">
        <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
        <span class="menu-title">Quản lý phim</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#phan_loai" aria-expanded="false" aria-controls="ui-basic">
        <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
        <span class="menu-title">Phân loại</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="phan_loai">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="#">Danh sách</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('categories.')}}">Thể loại</a></li>
          <li class="nav-item"> <a class="nav-link" href="#">Tags</a></li>
          <li class="nav-item"> <a class="nav-link" href="#">Khu vực</a></li>
          <li class="nav-item"> <a class="nav-link" href="#">Diễn viên</a></li>
          <li class="nav-item"> <a class="nav-link" href="#">Đạo diễn</a></li>
          <li class="nav-item"> <a class="nav-link" href="#">Studio</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
        <span class="menu-title">Phim lỗi</span>
      </a>
    </li>
    <li class="nav-item nav-category">Tùy chỉnh</li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
        <span class="menu-title">Menu</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#tuy_chinh" aria-expanded="false" aria-controls="ui-basic">
        <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
        <span class="menu-title">Cài đặt</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="tuy_chinh">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="#">Chung</a></li>
          <li class="nav-item"> <a class="nav-link" href="#">Trình phát</a></li>
          <li class="nav-item"> <a class="nav-link" href="#">Khác</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item nav-category">Authicention</li>
    <li class="nav-item {{ request()->is('users') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('users')}}">
        <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
        <span class="menu-title">Admin</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <span class="icon-bg"><i class="mdi mdi-lock menu-icon"></i></span>
        <span class="menu-title">Phân quyền</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="#"> Quyền </a></li>
          <li class="nav-item"> <a class="nav-link" href="#"> Vai trò </a></li>
        </ul>
      </div>
    </li>
    {{-- <li class="nav-item documentation-link">
      <a class="nav-link" href="http://www.bootstrapdash.com/demo/connect-plus-free/jquery/documentation/documentation.html" target="_blank">
        <span class="icon-bg">
          <i class="mdi mdi-file-document-box menu-icon"></i>
        </span>
        <span class="menu-title">Documentation</span>
      </a>
    </li>
    <li class="nav-item sidebar-user-actions">
      <div class="user-details">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <div class="d-flex align-items-center">
              <div class="sidebar-profile-img">
                <img src="assets/images/faces/face28.png" alt="image">
              </div>
              <div class="sidebar-profile-text">
                <p class="mb-1">Henry Klein</p>
              </div>
            </div>
          </div>
          <div class="badge badge-danger">3</div>
        </div>
      </div>
    </li>
    <li class="nav-item sidebar-user-actions">
      <div class="sidebar-user-menu">
        <a href="#" class="nav-link"><i class="mdi mdi-settings menu-icon"></i>
          <span class="menu-title">Settings</span>
        </a>
      </div>
    </li>
    <li class="nav-item sidebar-user-actions">
      <div class="sidebar-user-menu">
        <a href="#" class="nav-link"><i class="mdi mdi-speedometer menu-icon"></i>
          <span class="menu-title">Take Tour</span></a>
      </div>
    </li>
    <li class="nav-item sidebar-user-actions">
      <div class="sidebar-user-menu">
        <a href="#" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
          <span class="menu-title">Log Out</span></a>
      </div>
    </li>
  </ul> --}}
</nav>