<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @include('partials._head')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      @include('partials._navbar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        @include('partials._sidebar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> {{ $title ?? 'Quản trị G-movie' }} </h3>
              <nav aria-label="breadcrumb">
                {{-- <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">{{ $menu_title ?? 'Quản trị G-movie' }}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $title ?? 'Quản trị G-movie' }}</li>
                </ol> --}}
                @if(isset($route_new))
                <a href="{{ $route_new }}" class="btn btn-primary">Thêm mới</a>
                @elseif(isset($modal_id))
                <a href="#" data-bs-toggle="modal" data-bs-target="#{{$modal_id}}" class="btn btn-primary">Thêm mới</a>
                @endif
                @if(isset($route_list))
                <a href="{{ $route_list }}" class="btn btn-success">Danh sách</a>
                @endif
              </nav>
            </div>
            @yield('content')
            @if(isset($slot)) {{$slot}} @endif
            @yield('modal')
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          @include('partials._footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    @include('partials._script')
</body>
</html>