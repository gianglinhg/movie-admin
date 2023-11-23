<!doctype html>
<html lang="en-US">
   <head>
      @include('site.partials.__head')
   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
      <!-- Header -->
      <header id="main-header">
        @include('site.partials.__header')
      </header>
      <!-- Header End -->
      <!-- Slider Start -->
      @include('site.partials.__hero')
      <!-- Slider End -->
      <!-- MainContent -->
      <div class="main-content">
        @yield('site_content')
      </div>

      {{-- Footer --}}
      @include('site.partials.__footer')
      {{-- End Footer --}}

      <!-- MainContent End-->

      {{-- Script --}}
      @include('site.partials.__scripts')
   </body>
</html>