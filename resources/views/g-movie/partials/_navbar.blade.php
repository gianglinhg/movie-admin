<nav class="flex-row p-0 navbar default-layout-navbar col-lg-12 col-12 fixed-top d-flex">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo" href="#"><img src="{{asset('/assets/images/logo.png')}}" alt="logo" style="object-fit: cover" /></a>
    <a class="navbar-brand brand-logo-mini" href="#"><img src="{{asset('assets/images/favicon.png')}}" alt="favicon" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    <div class="search-field d-none d-xl-block">
      <form class="d-flex align-items-center h-100" action="#">
        <div class="input-group">
          <div class="bg-transparent input-group-prepend">
            <i class="border-0 input-group-text mdi mdi-magnify"></i>
          </div>
          <input type="text" class="bg-transparent border-0 form-control" placeholder="Search products">
        </div>
      </form>
    </div>
    <ul class="navbar-nav navbar-nav-right">
      {{-- <li class="nav-item dropdown d-none d-md-block">
        <a class="nav-link dropdown-toggle" id="reportDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false"> Reports </a>
        <div class="dropdown-menu navbar-dropdown" aria-labelledby="reportDropdown">
          <a class="dropdown-item" href="#">
            <i class="mdi mdi-file-pdf me-2"></i>PDF </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
            <i class="mdi mdi-file-excel me-2"></i>Excel </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
            <i class="mdi mdi-file-word me-2"></i>doc </a>
        </div>
      </li>
      <li class="nav-item dropdown d-none d-md-block">
        <a class="nav-link dropdown-toggle" id="projectDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false"> Projects </a>
        <div class="dropdown-menu navbar-dropdown" aria-labelledby="projectDropdown">
          <a class="dropdown-item" href="#">
            <i class="mdi mdi-eye-outline me-2"></i>View Project </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
            <i class="mdi mdi-pencil-outline me-2"></i>Edit Project </a>
        </div>
      </li>
      <li class="nav-item nav-language dropdown d-none d-md-block">
        <a class="nav-link dropdown-toggle" id="languageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <div class="nav-language-icon">
            <i class="flag-icon flag-icon-us" title="us" id="us"></i>
          </div>
          <div class="nav-language-text">
            <p class="mb-1 text-black">English</p>
          </div>
        </a>
        <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
          <a class="dropdown-item" href="#">
            <div class="nav-language-icon me-2">
              <i class="flag-icon flag-icon-ae" title="ae" id="ae"></i>
            </div>
            <div class="nav-language-text">
              <p class="mb-1 text-black">Arabic</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
            <div class="nav-language-icon me-2">
              <i class="flag-icon flag-icon-gb" title="GB" id="gb"></i>
            </div>
            <div class="nav-language-text">
              <p class="mb-1 text-black">English</p>
            </div>
          </a>
        </div>
      </li> --}}
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <div class="nav-profile-img">
            <img src="assets/images/faces/face28.png" alt="image">
          </div>
          <div class="nav-profile-text">
            <p class="mb-1 text-black">{{\Auth::user()->name}}</p>
          </div>
        </a>
        <div class="p-0 border-0 dropdown-menu navbar-dropdown dropdown-menu-right font-size-sm" aria-labelledby="profileDropdown" data-x-placement="bottom-end">
          {{-- <div class="p-3 text-center bg-primary">
            <img class="img-avatar img-avatar48 img-avatar-thumb" src="assets/images/faces/face28.png" alt="">
          </div> --}}
          <div class="p-2">
            <h5 class="dropdown-header text-uppercase ps-2 text-dark">User Options</h5>
            {{-- <a class="py-1 dropdown-item d-flex align-items-center justify-content-between" href="#">
              <span>Inbox</span>
              <span class="p-0">
                <span class="badge badge-primary">3</span>
                <i class="mdi mdi-email-open-outline ms-1"></i>
              </span>
            </a> --}}
            <a class="py-1 dropdown-item d-flex align-items-center justify-content-between" href="{{ route('admin.profile.edit')}}">
              <span>Profile</span>
              <span class="p-0">
                {{-- <span class="badge badge-success">1</span> --}}
                <i class="mdi mdi-account-outline ms-1"></i>
              </span>
            </a>
            {{-- <a class="py-1 dropdown-item d-flex align-items-center justify-content-between" href="#">
              <span>Settings</span>
              <i class="mdi mdi-settings"></i>
            </a> --}}
            <div role="separator" class="dropdown-divider"></div>
            <h5 class="mt-2 dropdown-header text-uppercase ps-2 text-dark">Actions</h5>
            <a class="py-1 dropdown-item d-flex align-items-center justify-content-between" href="#">
              <span>Lock Account</span>
              <i class="mdi mdi-lock ms-1"></i>
            </a>
            <form action="{{ route('logout')}}" method="post">
              @csrf
              <a class="py-1 dropdown-item d-flex align-items-center justify-content-between logout-btn" href="#" onclick="event.preventDefault();
              this.closest('form').submit();">
                <span>Log Out</span>
                <i class="mdi mdi-logout ms-1"></i>
              </a>
          </form>
          </div>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="mdi mdi-email-outline"></i>
          <span class="count-symbol bg-success"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list" aria-labelledby="messageDropdown">
          <h6 class="p-3 py-4 mb-0 text-white bg-primary">Messages</h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <img src="assets/images/faces/face4.jpg" alt="image" class="profile-pic">
            </div>
            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
              <h6 class="mb-1 preview-subject ellipsis font-weight-normal">Mark send you a message</h6>
              <p class="mb-0 text-gray"> 1 Minutes ago </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <img src="assets/images/faces/face2.jpg" alt="image" class="profile-pic">
            </div>
            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
              <h6 class="mb-1 preview-subject ellipsis font-weight-normal">Cregh send you a message</h6>
              <p class="mb-0 text-gray"> 15 Minutes ago </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <img src="assets/images/faces/face3.jpg" alt="image" class="profile-pic">
            </div>
            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
              <h6 class="mb-1 preview-subject ellipsis font-weight-normal">Profile picture updated</h6>
              <p class="mb-0 text-gray"> 18 Minutes ago </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <h6 class="p-3 mb-0 text-center">4 new messages</h6>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
          <i class="mdi mdi-bell-outline"></i>
          <span class="count-symbol bg-danger"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
          <h6 class="p-3 py-4 mb-0 text-white bg-primary">Notifications</h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-success">
                <i class="mdi mdi-calendar"></i>
              </div>
            </div>
            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
              <h6 class="mb-1 preview-subject font-weight-normal">Event today</h6>
              <p class="mb-0 text-gray ellipsis"> Just a reminder that you have an event today </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-warning">
                <i class="mdi mdi-settings"></i>
              </div>
            </div>
            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
              <h6 class="mb-1 preview-subject font-weight-normal">Settings</h6>
              <p class="mb-0 text-gray ellipsis"> Update dashboard </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-info">
                <i class="mdi mdi-link-variant"></i>
              </div>
            </div>
            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
              <h6 class="mb-1 preview-subject font-weight-normal">Launch Admin</h6>
              <p class="mb-0 text-gray ellipsis"> New admin wow! </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <h6 class="p-3 mb-0 text-center">See all notifications</h6>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>