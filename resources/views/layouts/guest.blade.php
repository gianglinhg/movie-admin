<!DOCTYPE html>
<html lang="en">
<head>
    @include('g-movie.partials._head')
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            @yield('content')
            @if(isset($slot)) {{$slot}} @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('g-movie.partials._script')
</body>
</html>
