@extends('layouts.site')
@section('site_content')
<section id="iq-favorites">
  <div class="container-fluid">
     <div class="row">
        <div class="col-sm-12 overflow-hidden">
           <div class="iq-main-header d-flex align-items-center justify-content-between">
              <h4 class="main-title">Latest Movies</h4>
              <a class="iq-view-all" href="#">View All</a>
           </div>
           <div class="favorites-contens">
              <ul class="favorites-slider list-inline  row p-0 mb-0">
                @foreach($latest_movies as $item)
                 <li class="slide-item">
                     <a href="{{ route('show_single', ['slug' => $item->slug])}}">
                       <div class="block-images position-relative">
                          <div class="img-box">
                             <img src="{{$item->poster_url}}" class="img-fluid" alt="">
                          </div>
                          <div class="block-description">
                             <h6 class="iq-title"><a href="{{ route('show_single', ['slug' => $item->slug])}}">{{$item->name}}</a></h6>
                             <div class="movie-time d-flex align-items-center my-2">
                                <div class="badge badge-secondary p-1 mr-2">13+</div>
                                <span class="text-white">{{$item->episode_time}}</span>
                             </div>
                             <div class="hover-buttons">
                                <span class="btn btn-hover iq-button">
                                <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                  Phát
                                </span>
                             </div>
                          </div>

                          <div class="block-social-info">
                              <ul class="list-inline p-0 m-0 music-play-lists">
                                 <li>
                                     <span><i class="ri-heart-fill"></i></span>
                                     <span class="count-box">19+</span>
                                  </li>
                                <li><span><i class="ri-add-line"></i></span></li>
                              </ul>
                           </div>
                       </div>
                    </a>
                 </li>
                @endforeach
              </ul>
           </div>
        </div>
     </div>
  </div>
</section>
{{-- <section id="iq-upcoming-movie">
  <div class="container-fluid">
     <div class="row">
        <div class="col-sm-12 overflow-hidden">
           <div class="iq-main-header d-flex align-items-center justify-content-between">
              <h4 class="main-title">Upcoming Movies</h4>
              <a class="iq-view-all" href="movie-category.html">View All</a>
           </div>
           <div class="upcoming-contens">
              <ul class="favorites-slider list-inline row p-0 mb-0">
                 <li class="slide-item">

                       <div class="block-images position-relative">
                          <div class="img-box">
                             <img src="{{asset('site/images/upcoming/01.jpg')}}" class="img-fluid" alt="">
                          </div>
                          <div class="block-description">
                             <h6 class="iq-title"><a href="movie-details.html">The Last Breath</a></h6>
                             <div class="movie-time d-flex align-items-center my-2">
                                <div class="badge badge-secondary p-1 mr-2">5+</div>
                                <span class="text-white">2h 30m</span>
                             </div>
                             <div class="hover-buttons">
                                <span class="btn btn-hover iq-button"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                Play Now
                                </span>
                             </div>
                          </div>
                          <div class="block-social-info">
                             <ul class="list-inline p-0 m-0 music-play-lists">
                                <li class="share">
                                    <span><i class="ri-share-fill"></i></span>
                                    <div class="share-box">
                                       <div class="d-flex align-items-center">
                                          <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/" target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i class="ri-facebook-fill"></i></a>
                                          <a href="https://twitter.com/intent/tweet?text=Currentlyreading" target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i class="ri-twitter-fill"></i></a>
                                          <a href="#" data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/" class="share-ico iq-copy-link" tabindex="0"><i class="ri-links-fill"></i></a>
                                       </div>
                                    </div>
                                 </li>
                                <li><span><i class="ri-heart-fill"></i></span>
                              <span class="count-box">19+</span></li>
                                <li><span><i class="ri-add-line"></i></span></li>
                             </ul>
                          </div>
                       </div>

                 </li>
                 <li class="slide-item">

                       <div class="block-images position-relative">
                          <div class="img-box">
                             <img src="{{asset('site/images/upcoming/02.jpg')}}" class="img-fluid" alt="">
                          </div>
                          <div class="block-description">
                             <h6 class="iq-title"><a href="movie-details.html">Shadow</a></h6>
                             <div class="movie-time d-flex align-items-center my-2">
                                <div class="badge badge-secondary p-1 mr-2">22+</div>
                                <span class="text-white">2h 15m</span>
                             </div>
                             <div class="hover-buttons">
                                <span class="btn btn-hover iq-button">
                                <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                Play Now
                                </span>
                             </div>
                          </div>
                          <div class="block-social-info">
                             <ul class="list-inline p-0 m-0 music-play-lists">
                                <li class="share">
                                    <span><i class="ri-share-fill"></i></span>
                                    <div class="share-box">
                                       <div class="d-flex align-items-center">
                                          <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/" target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i class="ri-facebook-fill"></i></a>
                                          <a href="https://twitter.com/intent/tweet?text=Currentlyreading" target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i class="ri-twitter-fill"></i></a>
                                          <a href="#" data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/" class="share-ico iq-copy-link" tabindex="0"><i class="ri-links-fill"></i></a>
                                       </div>
                                    </div>
                                 </li>
                                <li><span><i class="ri-heart-fill"></i></span>
                              <span class="count-box">19+</span></li>
                                <li><span><i class="ri-add-line"></i></span></li>
                             </ul>
                          </div>
                       </div>

                 </li>
                 <li class="slide-item">

                       <div class="block-images position-relative">
                          <div class="img-box">
                             <img src="{{asset('site/images/upcoming/03.jpg')}}" class="img-fluid" alt="">
                          </div>
                          <div class="block-description">
                             <h6 class="iq-title"> <a href="movie-details.html">Another Danger</a></h6>
                             <div class="movie-time d-flex align-items-center my-2">
                                <div class="badge badge-secondary p-1 mr-2">25+</div>
                                <span class="text-white">3h</span>
                             </div>
                             <div class="hover-buttons">
                                <span class="btn btn-hover iq-button">
                                <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                Play Now
                                </span>
                             </div>
                          </div>
                          <div class="block-social-info">
                             <ul class="list-inline p-0 m-0 music-play-lists">
                                <li class="share">
                                    <span><i class="ri-share-fill"></i></span>
                                    <div class="share-box">
                                       <div class="d-flex align-items-center">
                                          <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/" target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i class="ri-facebook-fill"></i></a>
                                          <a href="https://twitter.com/intent/tweet?text=Currentlyreading" target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i class="ri-twitter-fill"></i></a>
                                          <a href="#" data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/" class="share-ico iq-copy-link" tabindex="0"><i class="ri-links-fill"></i></a>
                                       </div>
                                    </div>
                                 </li>
                                <li><span><i class="ri-heart-fill"></i></span>
                              <span class="count-box">19+</span></li>
                                <li><span><i class="ri-add-line"></i></span></li>
                             </ul>
                          </div>
                       </div>

                 </li>
                 <li class="slide-item">

                       <div class="block-images position-relative">
                          <div class="img-box">
                             <img src="{{asset('site/images/upcoming/04.jpg')}}" class="img-fluid" alt="">
                          </div>
                          <div class="block-description">
                             <h6 class="iq-title"><a href="movie-details.html">1980</a></h6>
                             <div class="movie-time d-flex align-items-center my-2">
                                <div class="badge badge-secondary p-1 mr-2">11+</div>
                                <span class="text-white">2h 45m</span>
                             </div>
                             <div class="hover-buttons">
                                <span class="btn btn-hover iq-button">
                                <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                Play Now
                                </span>
                             </div>
                          </div>
                          <div class="block-social-info">
                             <ul class="list-inline p-0 m-0 music-play-lists">
                                <li class="share">
                                    <span><i class="ri-share-fill"></i></span>
                                    <div class="share-box">
                                       <div class="d-flex align-items-center">
                                          <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/" target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i class="ri-facebook-fill"></i></a>
                                          <a href="https://twitter.com/intent/tweet?text=Currentlyreading" target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i class="ri-twitter-fill"></i></a>
                                          <a href="#" data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/" class="share-ico iq-copy-link" tabindex="0"><i class="ri-links-fill"></i></a>
                                       </div>
                                    </div>
                                 </li>
                                <li><span><i class="ri-heart-fill"></i></span>
                              <span class="count-box">19+</span></li>
                                <li><span><i class="ri-add-line"></i></span></li>
                             </ul>
                          </div>
                       </div>

                 </li>
                 <li class="slide-item">

                       <div class="block-images position-relative">
                          <div class="img-box">
                             <img src="{{asset('site/images/upcoming/05.jpg')}}" class="img-fluid" alt="">
                          </div>
                          <div class="block-description">
                             <h6 class="iq-title"><a href="movie-details.html">Vugotronic</a></h6>
                             <div class="movie-time d-flex align-items-center my-2">
                                <div class="badge badge-secondary p-1 mr-2">9+</div>
                                <span class="text-white">2h 30m</span>
                             </div>
                             <div class="hover-buttons">
                                <span class="btn btn-hover iq-button">
                                <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                Play Now
                                </span>
                             </div>
                          </div>
                          <div class="block-social-info">
                             <ul class="list-inline p-0 m-0 music-play-lists">
                                <li class="share">
                                    <span><i class="ri-share-fill"></i></span>
                                    <div class="share-box">
                                       <div class="d-flex align-items-center">
                                          <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/" target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i class="ri-facebook-fill"></i></a>
                                          <a href="https://twitter.com/intent/tweet?text=Currentlyreading" target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i class="ri-twitter-fill"></i></a>
                                          <a href="#" data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/" class="share-ico iq-copy-link" tabindex="0"><i class="ri-links-fill"></i></a>
                                       </div>
                                    </div>
                                 </li>
                                <li><span><i class="ri-heart-fill"></i></span>
                              <span class="count-box">19+</span></li>
                                <li><span><i class="ri-add-line"></i></span></li>
                             </ul>
                          </div>
                       </div>

                 </li>
              </ul>
           </div>
        </div>
     </div>
  </div>
</section> --}}
<section id="iq-topten">
  <div class="container-fluid">
     <div class="row">
        <div class="col-sm-12 overflow-hidden">
           <div class="iq-main-header d-flex align-items-center justify-content-between">
              {{-- <h4 class="main-title iq-title topten-title-sm">Top 10 in India</h4> --}}
           </div>
           <div class="topten-contens">
              <h4 class="main-title iq-title topten-title">Top 10 phim tại Việt Nam</h4>
              <ul id="top-ten-slider" class="list-inline p-0 m-0  d-flex align-items-center">
                  @foreach($viewest_movies as $item)
                  <li class="slick-bg">
                     <a href="{{ route('show_single', ['slug' => $item->slug])}}">
                     <img src="{{ $item->poster_url}}" class="img-fluid w-100" alt="">
                     </a>
                  </li>
                 @endforeach
              </ul>
              <div class="vertical_s">
                 <ul id="top-ten-slider-nav" class="list-inline p-0 m-0  d-flex align-items-center">
                  @foreach($viewest_movies as $item)
                    <li>
                       <div class="block-images position-relative">
                          <a href="{{ route('show_single', ['slug' => $item->slug])}}">
                          <img src="{{ $item->poster_url}}" class="img-fluid w-100" alt="">
                          </a>
                          <div class="block-description">
                             <h5>{{ $item->name}}</h5>
                             <div class="movie-time d-flex align-items-center my-2">
                                <div class="badge badge-secondary p-1 mr-2">10+</div>
                                <span class="text-white">{{ $item->episode_time}}</span>
                             </div>
                             <div class="hover-buttons">
                                <a href="{{ route('show_single', ['slug' => $item->slug])}}" class="btn btn-hover" tabindex="0">
                                <i class="fa fa-play mr-1" aria-hidden="true"></i> Play Now
                                </a>
                             </div>
                          </div>
                       </div>
                    </li>
                 @endforeach
                 </ul>
              </div>
           </div>
        </div>
     </div>
  </div>
</section>
<section id="iq-suggestede" class="s-margin">
  <div class="container-fluid">
     <div class="row">
        <div class="col-sm-12 overflow-hidden">
           <div class="iq-main-header d-flex align-items-center justify-content-between">
              <h4 class="main-title">Phim đang chiếu</h4>
              <a class="iq-view-all" href="movie-category.html">View All</a>
           </div>
           <div class="suggestede-contens">
              <ul class="list-inline favorites-slider row p-0 mb-0">
                  @foreach($ongoing_movies as $item)
                 <li class="slide-item">

                       <div class="block-images position-relative">
                          <div class="img-box">
                             <img src="{{$item->poster_url}}" class="img-fluid" alt="">
                          </div>
                          <div class="block-description">
                             <h6 class="iq-title"><a href="{{ route('show_single', ['slug' => $item->slug])}}">{{$item->name}}</a></h6>
                             <div class="movie-time d-flex align-items-center my-2">
                                <div class="badge badge-secondary p-1 mr-2">11+</div>
                                <span class="text-white">{{$item->episode_time}}</span>
                             </div>
                             <div class="hover-buttons">
                                <span class="btn btn-hover iq-button"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                Play Now</span>
                             </div>
                          </div>
                          <div class="block-social-info">
                             <ul class="list-inline p-0 m-0 music-play-lists">
                                <li><span><i class="ri-heart-fill"></i></span>
                                 <span class="count-box">19+</span></li>
                                <li><span><i class="ri-add-line"></i></span></li>
                             </ul>
                          </div>
                       </div>

                 </li>
                 @endforeach
              </ul>
           </div>
        </div>
     </div>
  </div>
</section>
<section id="parallex" class="parallax-window" style="background: url({{$viewest_movies[2]->poster_url}}) center center;">
  <div class="container-fluid h-100">
     <div class="row align-items-center justify-content-center h-100 parallaxt-details">
        <div class="col-lg-4 r-mb-23">
           <div class="text-left">
              <a href="javascript:void(0);">
              {{-- <img src="{{$viewest_movies[2]->name}}" class="img-fluid" alt="bailey"> --}}
              <h6 class="iq-title img-fluid"><a href="#">{{$viewest_movies[2]->name}}</a></h6>
              </a>
              <div class="parallax-ratting d-flex align-items-center mt-3 mb-3">
                 <ul
                    class="ratting-start p-0 m-0 list-inline text-primary d-flex align-items-center justify-content-left">
                    <li><a href="javascript:void(0);" class="text-primary"><i class="fa fa-star"
                       aria-hidden="true"></i></a></li>
                    <li><a href="javascript:void(0);" class="pl-2 text-primary"><i class="fa fa-star"
                       aria-hidden="true"></i></a></li>
                    <li><a href="javascript:void(0);" class="pl-2 text-primary"><i class="fa fa-star"
                       aria-hidden="true"></i></a></li>
                    <li><a href="javascript:void(0);" class="pl-2 text-primary"><i class="fa fa-star"
                       aria-hidden="true"></i></a></li>
                    <li><a href="javascript:void(0);" class="pl-2 text-primary"><i class="fa fa-star-half-o"
                       aria-hidden="true"></i></a></li>
                 </ul>
                 <span class="text-white ml-3">9.2 (lmdb)</span>
              </div>
              <div class="movie-time d-flex align-items-center mb-3">
                 <div class="badge badge-secondary mr-3">13+</div>
                 <h6 class="text-white">2h 30m</h6>
              </div>
              <p>{!!$viewest_movies[0]->content!!}</p>
              <div class="parallax-buttons">
                 <a href="{{ route('show_single', ['slug' => $viewest_movies[0]->slug])}}" class="btn btn-hover">Play Now</a>
                 <a href="{{ route('show_single', ['slug' => $viewest_movies[0]->slug])}}" class="btn btn-link">More details</a>
              </div>
           </div>
        </div>
        <div class="col-lg-8">
           <div class="parallax-img">
              <a href="{{ route('show_single', ['slug' => $viewest_movies[2]->slug])}}">
                <img src="{{$viewest_movies[2]->poster_url}}" class="img-fluid w-100" alt="bailey">
              </a>
           </div>
        </div>
     </div>
  </div>
</section>
{{-- <section id="iq-trending" class="s-margin">
  <div class="container-fluid">
     <div class="row">
        <div class="col-sm-12 overflow-hidden">
           <div class="iq-main-header d-flex align-items-center justify-content-between">
              <h4 class="main-title">Trending</h4>
           </div>
           <div class="trending-contens">
              <ul id="trending-slider-nav" class="list-inline p-0 mb-0 row align-items-center">
                 <li>
                    <a href="javascript:void(0);">
                       <div class="movie-slick position-relative">
                          <img src="{{asset('site/images/trending/01.jpg')}}" class="img-fluid" alt="">
                       </div>
                    </a>
                 </li>
                 <li>
                    <a href="javascript:void(0);">
                       <div class="movie-slick position-relative">
                          <img src="{{asset('site/images/trending/02.jpg')}}" class="img-fluid" alt="">
                       </div>
                    </a>
                 </li>
                 <li>
                    <a href="javascript:void(0);">
                       <div class="movie-slick position-relative">
                          <img src="{{asset('site/images/trending/03.jpg')}}" class="img-fluid" alt="">
                       </div>
                    </a>
                 </li>
                 <li>
                    <a href="javascript:void(0);">
                       <div class="movie-slick position-relative">
                          <img src="{{asset('site/images/trending/04.jpg')}}" class="img-fluid" alt="">
                       </div>
                    </a>
                 </li>
                 <li>
                    <a href="javascript:void(0);">
                       <div class="movie-slick position-relative">
                          <img src="{{asset('site/images/trending/05.jpg')}}" class="img-fluid" alt="">
                       </div>
                    </a>
                 </li>
                 <li>
                    <a href="javascript:void(0);">
                       <div class="movie-slick position-relative">
                          <img src="{{asset('site/images/trending/06.jpg')}}" class="img-fluid" alt="">
                       </div>
                    </a>
                 </li>
              </ul>
              <ul id="trending-slider" class="list-inline p-0 m-0  d-flex align-items-center">
                 <li>
                    <div class="tranding-block position-relative"
                       style="background-image: url(images/trending/01.jpg);">
                       <div class="trending-custom-tab">
                          <div class="tab-title-info position-relative">
                             <ul class="trending-pills d-flex nav nav-pills justify-content-center align-items-center text-center"
                                role="tablist">
                                <li class="nav-item">
                                   <a class="nav-link active show" data-toggle="pill" href="#trending-data1"
                                      role="tab" aria-selected="true">Overview</a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" data-toggle="pill" href="#trending-data2" role="tab"
                                      aria-selected="false">Episodes</a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" data-toggle="pill" href="#trending-data3" role="tab"
                                      aria-selected="false">Trailers</a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" data-toggle="pill" href="#trending-data4" role="tab"
                                      aria-selected="false">Similar Like This</a>
                                </li>
                             </ul>
                          </div>
                          <div class="trending-content">
                             <div id="trending-data1" class="overview-tab tab-pane fade active show">
                                <div class="trending-info align-items-center w-100 animated fadeInUp">
                                   <a href="javascript:void(0);" tabindex="0">
                                      <div class="res-logo">
                                         <div class="channel-logo">
                                            <img src="{{asset('site/images/logo.png')}}" class="c-logo" alt="streamit">
                                         </div>
                                      </div>
                                   </a>
                                   <h1 class="trending-text big-title text-uppercase">the hero camp</h1>

                                   <div class="d-flex align-items-center text-white text-detail">
                                      <span class="badge badge-secondary p-3">18+</span>
                                      <span class="ml-3">3 Seasons</span>
                                      <span class="trending-year">2020</span>
                                   </div>
                                   <div class="d-flex align-items-center series mb-4">
                                      <a href="javascript:void(0);"><img src="{{asset('site/images/trending/trending-label.png')}}"
                                         class="img-fluid" alt=""></a>
                                      <span class="text-gold ml-3">#2 in Series Today</span>
                                   </div>
                                   <p class="trending-dec">Lorem Ipsum is simply dummy text of the printing and typesetting
                                      industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                   </p>
                                   <div class="p-btns">
                                      <div class="d-flex align-items-center p-0">
                                         <a href="show-details.html" class="btn btn-hover mr-2" tabindex="0"><i
                                            class="fa fa-play mr-2" aria-hidden="true"></i>Play Now</a>
                                         <a href="javascript:void(0);" class="btn btn-link" tabindex="0"><i class="ri-add-line"></i>My
                                         List</a>
                                      </div>
                                   </div>
                                   <div class="trending-list mt-4">
                                      <div class="text-primary title">Starring: <span class="text-body">Wagner
                                         Moura, Boyd Holbrook, Joanna</span>
                                      </div>
                                      <div class="text-primary title">Genres: <span class="text-body">Crime,
                                         Action, Thriller, Biography</span>
                                      </div>
                                      <div class="text-primary title">This Is: <span class="text-body">Violent,
                                         Forceful</span>
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <div id="trending-data2" class="overlay-tab tab-pane fade">
                                <div
                                   class="trending-info align-items-center w-100 animated fadeInUp">
                                   <a href="show-details.html" tabindex="0">
                                      <div class="channel-logo">
                                         <img src="{{asset('site/images/logo.png')}}" class="c-logo" alt="stramit">
                                      </div>
                                   </a>
                                   <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                   <div class="d-flex align-items-center text-white text-detail mb-4">
                                      <span class="season_date">
                                          2 Seasons
                                      </span>
                                           <span class="trending-year">Feb 2019</span>
                                   </div>
                                   <div class="iq-custom-select d-inline-block sea-epi">
                                      <select name="cars" class="form-control season-select">
                                         <option value="season1">Season 1</option>
                                         <option value="season2">Season 2</option>
                                         <option value="season3">Season 3</option>
                                      </select>
                                   </div>

                                   <div class="episodes-contens mt-4">
                                      <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                               </a>
                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 1</a>
                                                  <span class="text-primary">2.25 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                               </a>
                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body ">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 2</a>
                                                  <span class="text-primary">3.23 m</span>
                                               </div>
                                               <p class="mb-0">
                                                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                               </a>
                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 3</a>
                                                  <span class="text-primary">2 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                               </a>
                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body ">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 4</a>
                                                  <span class="text-primary">1.12 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                               </a>
                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 5</a>
                                                  <span class="text-primary">2.54 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <div id="trending-data3" class="overlay-tab tab-pane fade">
                                <div
                                   class="trending-info align-items-center w-100 animated fadeInUp">
                                   <a href="javascript:void(0);" tabindex="0">
                                      <div class="channel-logo">
                                         <img src="{{asset('site/images/logo.png')}}" class="c-logo" alt="stramit">
                                      </div>
                                   </a>
                                   <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                   <div class="episodes-contens mt-4">
                                      <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 1</a>
                                                  <span class="text-primary">2.25 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 2</a>
                                                  <span class="text-primary">3.23 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 3</a>
                                                  <span class="text-primary">2 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 4</a>
                                                  <span class="text-primary">1.12 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 5</a>
                                                  <span class="text-primary">2.54 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <div id="trending-data4" class="overlay-tab tab-pane fade">
                                <div
                                   class="trending-info align-items-center w-100 animated fadeInUp">
                                   <a href="javascript:void(0);" tabindex="0">
                                      <div class="channel-logo">
                                         <img src="{{asset('site/images/logo.png')}}" class="c-logo" alt="stramit">
                                      </div>
                                   </a>
                                   <h1 class="trending-text big-title text-uppercase">the hero camp</h1>
                                   <div class="episodes-contens mt-4">
                                      <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 1</a>
                                                  <span class="text-primary">2.25 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 2</a>
                                                  <span class="text-primary">3.23 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 3</a>
                                                  <span class="text-primary">2 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 4</a>
                                                  <span class="text-primary">1.12 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 5</a>
                                                  <span class="text-primary">2.54 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </li>
                 <li>
                    <div class="tranding-block position-relative"
                       style="background-image: url(images/trending/02.jpg);">
                       <div class="trending-custom-tab">
                          <div class="tab-title-info position-relative">
                             <ul class="trending-pills d-flex nav nav-pills justify-content-center align-items-center text-center"
                                role="tablist">
                                <li class="nav-item">
                                   <a class="nav-link active show" data-toggle="pill" href="#trending-data5"
                                      role="tab" aria-selected="true">Overview</a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" data-toggle="pill" href="#trending-data6" role="tab"
                                      aria-selected="false">Episodes</a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" data-toggle="pill" href="#trending-data7" role="tab"
                                      aria-selected="false">Trailers</a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" data-toggle="pill" href="#trending-data8" role="tab"
                                      aria-selected="false">Similar
                                   Like This</a>
                                </li>
                             </ul>
                          </div>
                          <div class="trending-content">
                             <div id="trending-data5" class="overview-tab tab-pane fade active show">
                                <div
                                   class="trending-info align-items-center w-100 animated fadeInUp">
                                   <a href="javascript:void(0);" tabindex="0">
                                      <div class="res-logo">
                                         <div class="channel-logo">
                                            <img src="{{asset('site/images/logo.png')}}" class="c-logo" alt="streamit">
                                         </div>
                                      </div>
                                   </a>
                                   <h1 class="trending-text big-title text-uppercase">The Appartment</h1>
                                   <div class="d-flex align-items-center text-white text-detail">
                                      <span class="badge badge-secondary p-3">15+</span>
                                      <span class="ml-3">2 Seasons</span>
                                      <span class="trending-year">2020</span>
                                   </div>
                                   <div class="d-flex align-items-center series mb-4">
                                      <a href="javascript:void(0);"><img src="{{asset('site/images/trending/trending-label.png')}}"
                                         class="img-fluid" alt=""></a>
                                      <span class="text-gold ml-3">#2 in Series Today</span>
                                   </div>
                                   <p class="trending-dec">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                                      dummy text ever since the 1500s.
                                   </p>
                                   <div class="p-btns">
                                      <div class="d-flex align-items-center p-0">
                                         <a href="show-details.html" class="btn btn-hover mr-2" tabindex="0"><i
                                            class="fa fa-play mr-2" aria-hidden="true"></i>Play Now</a>
                                         <a href="javascript:void(0);" class="btn btn-link" tabindex="0"><i class="ri-add-line"></i>My
                                         List</a>
                                      </div>
                                   </div>
                                   <div class="trending-list mt-4">
                                      <div class="text-primary title">Starring: <span class="text-body">Wagner
                                         Moura, Boyd Holbrook, Joanna</span>
                                      </div>
                                      <div class="text-primary title">Genres: <span class="text-body">Crime,
                                         Action, Thriller, Biography</span>
                                      </div>
                                      <div class="text-primary title">This Is: <span class="text-body">Violent,
                                         Forceful</span>
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <div id="trending-data6" class="overlay-tab tab-pane fade">
                                <div
                                   class="trending-info align-items-center w-100 animated fadeInUp">
                                   <a href="show-details.html" tabindex="0">
                                      <div class="channel-logo">
                                         <img src="{{asset('site/images/logo.png')}}" class="c-logo" alt="stramit">
                                      </div>
                                   </a>
                                   <h1 class="trending-text big-title text-uppercase">The Appartment</h1>
                                   <div class="d-flex align-items-center text-white text-detail mb-4">
                                      <span class="season_date">
                                          2 Seasons
                                      </span>
                                           <span class="trending-year">Feb 2019</span>
                                   </div>

                                   <div class="iq-custom-select d-inline-block sea-epi">
                                      <select name="cars" class="form-control season-select">
                                         <option value="season1">Season 1</option>
                                         <option value="season2">Season 2</option>
                                      </select>
                                   </div>
                                   <div class="episodes-contens mt-4">
                                      <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 1</a>
                                                  <span class="text-primary">2.25 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 2</a>
                                                  <span class="text-primary">3.23 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 3</a>
                                                  <span class="text-primary">2 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 4</a>
                                                  <span class="text-primary">1.12 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 5</a>
                                                  <span class="text-primary">2.54 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <div id="trending-data7" class="overlay-tab tab-pane fade">
                                <div
                                   class="trending-info align-items-center w-100 animated fadeInUp">
                                   <a href="javascript:void(0);" tabindex="0">
                                      <div class="channel-logo">
                                         <img src="{{asset('site/images/logo.png')}}" class="c-logo" alt="stramit">
                                      </div>
                                   </a>
                                   <h1 class="trending-text big-title text-uppercase">The Appartment</h1>
                                   <div class="episodes-contens mt-4">
                                      <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 1</a>
                                                  <span class="text-primary">2.25 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 2</a>
                                                  <span class="text-primary">3.23 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 3</a>
                                                  <span class="text-primary">2 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 4</a>
                                                  <span class="text-primary">1.12 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 5</a>
                                                  <span class="text-primary">2.54 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <div id="trending-data8" class="overlay-tab tab-pane fade">
                                <div
                                   class="trending-info align-items-center w-100 animated fadeInUp">
                                   <a href="javascript:void(0);" tabindex="0">
                                      <div class="channel-logo">
                                         <img src="{{asset('site/images/logo.png')}}" class="c-logo" alt="stramit">
                                      </div>
                                   </a>
                                   <h1 class="trending-text big-title text-uppercase">The Appartment</h1>
                                   <div class="episodes-contens mt-4">
                                      <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 1</a>
                                                  <span class="text-primary">2.25 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 2</a>
                                                  <span class="text-primary">3.23 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 3</a>
                                                  <span class="text-primary">2 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 4</a>
                                                  <span class="text-primary">1.12 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 5</a>
                                                  <span class="text-primary">2.54 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </li>
                 <li>
                    <div class="tranding-block position-relative"
                       style="background-image: url(images/trending/03.jpg);">
                       <div class="trending-custom-tab">
                          <div class="tab-title-info position-relative">
                             <ul class="trending-pills d-flex nav nav-pills justify-content-center align-items-center text-center"
                                role="tablist">
                                <li class="nav-item">
                                   <a class="nav-link active show" data-toggle="pill" href="#trending-data9"
                                      role="tab" aria-selected="true">Overview</a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" data-toggle="pill" href="#trending-data10" role="tab"
                                      aria-selected="false">Episodes</a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" data-toggle="pill" href="#trending-data11" role="tab"
                                      aria-selected="false">Trailers</a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" data-toggle="pill" href="#trending-data12" role="tab"
                                      aria-selected="false">Similar
                                   Like This</a>
                                </li>
                             </ul>
                          </div>
                          <div class="trending-content">
                             <div id="trending-data9" class="overview-tab tab-pane fade active show">
                                <div
                                   class="trending-info align-items-center w-100 animated fadeInUp">
                                   <a href="javascript:void(0);" tabindex="0">
                                      <div class="res-logo">
                                         <div class="channel-logo">
                                            <img src="{{asset('site/images/logo.png')}}" class="c-logo" alt="streamit">
                                         </div>
                                      </div>
                                   </a>
                                   <h1 class="trending-text big-title text-uppercase ">the marshal king</h1>
                                   <div class="d-flex align-items-center text-white text-detail">
                                      <span class="badge badge-secondary p-3">11+</span>
                                      <span class="ml-3">3 Seasons</span>
                                      <span class="trending-year">2020</span>
                                   </div>
                                   <div class="d-flex align-items-center series mb-4">
                                      <a href="javascript:void(0);"><img src="{{asset('site/images/trending/trending-label.png')}}"
                                         class="img-fluid" alt=""></a>
                                      <span class="text-gold ml-3">#11 in Series Today</span>
                                   </div>
                                   <p class="trending-dec">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                                      dummy text ever since the 1500s.
                                   </p>
                                   <div class="p-btns">
                                      <div class="d-flex align-items-center p-0">
                                         <a href="show-details.html" class="btn btn-hover mr-2" tabindex="0"><i
                                            class="fa fa-play mr-2" aria-hidden="true"></i>Play Now</a>
                                         <a href="javascript:void(0);" class="btn btn-link" tabindex="0"><i class="ri-add-line"></i>My
                                         List</a>
                                      </div>
                                   </div>
                                   <div class="trending-list mt-4">
                                      <div class="text-primary title">Starring: <span class="text-body">Wagner
                                         Moura, Boyd Holbrook, Joanna</span>
                                      </div>
                                      <div class="text-primary title">Genres: <span class="text-body">Crime,
                                         Action, Thriller, Biography</span>
                                      </div>
                                      <div class="text-primary title">This Is: <span class="text-body">Violent,
                                         Forceful</span>
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <div id="trending-data10" class="overlay-tab tab-pane fade">
                                <div
                                   class="trending-info align-items-center w-100 animated fadeInUp">
                                   <a href="show-details.html" tabindex="0">
                                      <div class="channel-logo">
                                         <img src="{{asset('site/images/logo.png')}}" class="c-logo" alt="stramit">
                                      </div>
                                   </a>
                                   <h1 class="trending-text big-title text-uppercase">the marshal king</h1>
                                   <div class="d-flex align-items-center text-white text-detail mb-4">
                                      <span class="season_date">
                                          2 Seasons
                                      </span>
                                           <span class="trending-year">Feb 2019</span>
                                   </div>

                                   <div class="iq-custom-select d-inline-block sea-epi">
                                      <select name="cars" class="form-control season-select">
                                         <option value="season1">Season 1</option>
                                         <option value="season2">Season 2</option>
                                         <option value="season3">Season 3</option>
                                      </select>
                                   </div>
                                   <div class="episodes-contens mt-4">
                                      <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 1</a>
                                                  <span class="text-primary">2.25 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 2</a>
                                                  <span class="text-primary">3.23 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 3</a>
                                                  <span class="text-primary">2 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 4</a>
                                                  <span class="text-primary">1.12 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 5</a>
                                                  <span class="text-primary">2.54 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <div id="trending-data11" class="overlay-tab tab-pane fade">
                                <div
                                   class="trending-info align-items-center w-100 animated fadeInUp">
                                   <a href="javascript:void(0);" tabindex="0">
                                      <div class="channel-logo">
                                         <img src="{{asset('site/images/logo.png')}}" class="c-logo" alt="stramit">
                                      </div>
                                   </a>
                                   <h1 class="trending-text big-title text-uppercase">the marshal king</h1>
                                   <div class="episodes-contens mt-4">
                                      <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 1</a>
                                                  <span class="text-primary">2.25 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 2</a>
                                                  <span class="text-primary">3.23 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 3</a>
                                                  <span class="text-primary">2 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 4</a>
                                                  <span class="text-primary">1.12 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 5</a>
                                                  <span class="text-primary">2.54 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <div id="trending-data12" class="overlay-tab tab-pane fade">
                                <div
                                   class="trending-info align-items-center w-100 animated fadeInUp">
                                   <a href="javascript:void(0);" tabindex="0">
                                      <div class="channel-logo">
                                         <img src="{{asset('site/images/logo.png')}}" class="c-logo" alt="stramit">
                                      </div>
                                   </a>
                                   <h1 class="trending-text big-title text-uppercase">the marshal king</h1>
                                   <div class="episodes-contens mt-4">
                                      <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 1</a>
                                                  <span class="text-primary">2.25 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 2</a>
                                                  <span class="text-primary">3.23 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 3</a>
                                                  <span class="text-primary">2 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 4</a>
                                                  <span class="text-primary">1.12 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 5</a>
                                                  <span class="text-primary">2.54 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </li>
                 <li>
                    <div class="tranding-block position-relative"
                       style="background-image: url(images/trending/04.jpg);">
                       <div class="trending-custom-tab">
                          <div class="tab-title-info position-relative">
                             <ul class="trending-pills d-flex nav nav-pills justify-content-center align-items-center text-center"
                                role="tablist">
                                <li class="nav-item">
                                   <a class="nav-link active show" data-toggle="pill" href="#trending-data13"
                                      role="tab" aria-selected="true">Overview</a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" data-toggle="pill" href="#trending-data14" role="tab"
                                      aria-selected="false">Episodes</a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" data-toggle="pill" href="#trending-data15" role="tab"
                                      aria-selected="false">Trailers</a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" data-toggle="pill" href="#trending-data16" role="tab"
                                      aria-selected="false">Similar
                                   Like This</a>
                                </li>
                             </ul>
                          </div>
                          <div class="trending-content">
                             <div id="trending-data13" class="overview-tab tab-pane fade active show">
                                <div
                                   class="trending-info align-items-center w-100 animated fadeInUp">
                                   <a href="javascript:void(0);" tabindex="0">
                                      <div class="res-logo">
                                         <div class="channel-logo">
                                            <img src="{{asset('site/images/logo.png')}}" class="c-logo" alt="streamit">
                                         </div>
                                      </div>
                                   </a>
                                   <h1 class="trending-text big-title text-uppercase ">Dark Zone</h1>
                                   <div class="d-flex align-items-center text-white text-detail">
                                      <span class="badge badge-secondary p-3">17+</span>
                                      <span class="ml-3">1 Season</span>
                                      <span class="trending-year">2020</span>
                                   </div>
                                   <div class="d-flex align-items-center series mb-4">
                                      <a href="javascript:void(0);"><img src="{{asset('site/images/trending/trending-label.png')}}"
                                         class="img-fluid" alt=""></a>
                                      <span class="text-gold ml-3">#2 in Series Today</span>
                                   </div>
                                   <p class="trending-dec">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                                      dummy text ever since the 1500s.
                                   </p>
                                   <div class="p-btns">
                                      <div class="d-flex align-items-center p-0">
                                         <a href="show-details.html" class="btn btn-hover mr-2" tabindex="0"><i
                                            class="fa fa-play mr-2" aria-hidden="true"></i>Play Now</a>
                                         <a href="javascript:void(0);" class="btn btn-link" tabindex="0"><i class="ri-add-line"></i>My
                                         List</a>
                                      </div>
                                   </div>
                                   <div class="trending-list mt-4">
                                      <div class="text-primary title">Starring: <span class="text-body">Wagner
                                         Moura, Boyd Holbrook, Joanna</span>
                                      </div>
                                      <div class="text-primary title">Genres: <span class="text-body">Crime,
                                         Action, Thriller, Biography</span>
                                      </div>
                                      <div class="text-primary title">This Is: <span class="text-body">Violent,
                                         Forceful</span>
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <div id="trending-data14" class="overlay-tab tab-pane fade">
                                <div
                                   class="trending-info align-items-center w-100 animated fadeInUp">
                                   <a href="show-details.html" tabindex="0">
                                      <div class="channel-logo">
                                         <img src="{{asset('site/images/logo.png')}}" class="c-logo" alt="stramit">
                                      </div>
                                   </a>
                                   <h1 class="trending-text big-title text-uppercase">Dark Zone</h1>
                                   <div class="d-flex align-items-center text-white text-detail mb-4">
                                      <span class="season_date">
                                          2 Seasons
                                      </span>
                                           <span class="trending-year">Feb 2019</span>
                                   </div>

                                   <div class="iq-custom-select d-inline-block sea-epi">
                                      <select name="cars" class="form-control season-select">
                                         <option value="season1">Season 1</option>
                                         <option value="season2">Season 2</option>
                                      </select>
                                   </div>
                                   <div class="episodes-contens mt-4">
                                      <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 1</a>
                                                  <span class="text-primary">2.25 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 2</a>
                                                  <span class="text-primary">3.23 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 3</a>
                                                  <span class="text-primary">2 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 4</a>
                                                  <span class="text-primary">1.12 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 5</a>
                                                  <span class="text-primary">2.54 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <div id="trending-data15" class="overlay-tab tab-pane fade">
                                <div
                                   class="trending-info align-items-center w-100 animated fadeInUp">
                                   <a href="javascript:void(0);" tabindex="0">
                                      <div class="channel-logo">
                                         <img src="{{asset('site/images/logo.png')}}" class="c-logo" alt="stramit">
                                      </div>
                                   </a>
                                   <h1 class="trending-text big-title text-uppercase">Dark Zone</h1>
                                   <div class="episodes-contens mt-4">
                                      <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 1</a>
                                                  <span class="text-primary">2.25 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 2</a>
                                                  <span class="text-primary">3.23 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 3</a>
                                                  <span class="text-primary">2 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 4</a>
                                                  <span class="text-primary">1.12 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 5</a>
                                                  <span class="text-primary">2.54 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <div id="trending-data16" class="overlay-tab tab-pane fade">
                                <div
                                   class="trending-info align-items-center w-100 animated fadeInUp">
                                   <a href="javascript:void(0);" tabindex="0">
                                      <div class="channel-logo">
                                         <img src="{{asset('site/images/logo.png')}}" class="c-logo" alt="stramit">
                                      </div>
                                   </a>
                                   <h1 class="trending-text big-title text-uppercase">Dark Zone</h1>
                                   <div class="episodes-contens mt-4">
                                      <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 1</a>
                                                  <span class="text-primary">2.25 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 2</a>
                                                  <span class="text-primary">3.23 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 3</a>
                                                  <span class="text-primary">2 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 4</a>
                                                  <span class="text-primary">1.12 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 5</a>
                                                  <span class="text-primary">2.54 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </li>
                 <li>
                    <div class="tranding-block position-relative"
                       style="background-image: url(images/trending/05.jpg);">
                       <div class="trending-custom-tab">
                          <div class="tab-title-info position-relative">
                             <ul class="trending-pills d-flex nav nav-pills justify-content-center align-items-center text-center"
                                role="tablist">
                                <li class="nav-item">
                                   <a class="nav-link active show" data-toggle="pill" href="#trending-data17"
                                      role="tab" aria-selected="true">Overview</a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" data-toggle="pill" href="#trending-data18" role="tab"
                                      aria-selected="false">Episodes</a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" data-toggle="pill" href="#trending-data19" role="tab"
                                      aria-selected="false">Trailers</a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" data-toggle="pill" href="#trending-data20" role="tab"
                                      aria-selected="false">Similar
                                   Like This</a>
                                </li>
                             </ul>
                          </div>
                          <div class="trending-content">
                             <div id="trending-data17" class="overview-tab tab-pane fade active show">
                                <div
                                   class="trending-info align-items-center w-100 animated fadeInUp">
                                   <a href="javascript:void(0);" tabindex="0">
                                      <div class="res-logo">
                                         <div class="channel-logo">
                                            <img src="{{asset('site/images/logo.png')}}" class="c-logo" alt="streamit">
                                         </div>
                                      </div>
                                   </a>
                                   <h1 class="trending-text big-title text-uppercase">Opposites Attract</h1>
                                   <div class="d-flex align-items-center text-white text-detail">
                                      <span class="badge badge-secondary p-3">7+</span>
                                      <span class="ml-3">2 Seasons</span>
                                      <span class="trending-year">2020</span>
                                   </div>
                                   <div class="d-flex align-items-center series mb-4">
                                      <a href="javascript:void(0);"><img src="{{asset('site/images/trending/trending-label.png')}}"
                                         class="img-fluid" alt=""></a>
                                      <span class="text-gold ml-3">#2 in Series Today</span>
                                   </div>
                                   <p class="trending-dec">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                                      dummy text ever since the 1500s.
                                   </p>
                                   <div class="p-btns">
                                      <div class="d-flex align-items-center p-0">
                                         <a href="show-details.html" class="btn btn-hover mr-2" tabindex="0"><i
                                            class="fa fa-play mr-2" aria-hidden="true"></i>Play Now</a>
                                         <a href="javascript:void(0);" class="btn btn-link" tabindex="0"><i class="ri-add-line"></i>My
                                         List</a>
                                      </div>
                                   </div>
                                   <div class="trending-list mt-4">
                                      <div class="text-primary title">Starring: <span class="text-body">Wagner
                                         Moura, Boyd Holbrook, Joanna</span>
                                      </div>
                                      <div class="text-primary title">Genres: <span class="text-body">Crime,
                                         Action, Thriller, Biography</span>
                                      </div>
                                      <div class="text-primary title">This Is: <span class="text-body">Violent,
                                         Forceful</span>
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <div id="trending-data18" class="overlay-tab tab-pane fade">
                                <div
                                   class="trending-info align-items-center w-100 animated fadeInUp">
                                   <a href="show-details.html" tabindex="0">
                                      <div class="channel-logo">
                                         <img src="{{asset('site/images/logo.png')}}" class="c-logo" alt="stramit">
                                      </div>
                                   </a>
                                   <h1 class="trending-text big-title text-uppercase">Opposites Attract</h1>
                                   <div class="d-flex align-items-center text-white text-detail mb-4">
                                      <span class="season_date">
                                          2 Seasons
                                      </span>
                                           <span class="trending-year">Feb 2019</span>
                                   </div>

                                   <div class="iq-custom-select d-inline-block sea-epi">
                                      <select name="cars" class="form-control season-select">
                                         <option value="season1">Season 1</option>
                                         <option value="season2">Season 2</option>
                                      </select>
                                   </div>
                                   <div class="episodes-contens mt-4">
                                      <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 1</a>
                                                  <span class="text-primary">2.25 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 2</a>
                                                  <span class="text-primary">3.23 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 3</a>
                                                  <span class="text-primary">2 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 4</a>
                                                  <span class="text-primary">1.12 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 5</a>
                                                  <span class="text-primary">2.54 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <div id="trending-data19" class="overlay-tab tab-pane fade">
                                <div
                                   class="trending-info align-items-center w-100 animated fadeInUp">
                                   <a href="javascript:void(0);" tabindex="0">
                                      <div class="channel-logo">
                                         <img src="{{asset('site/images/logo.png')}}" class="c-logo" alt="stramit">
                                      </div>
                                   </a>
                                   <h1 class="trending-text big-title text-uppercase">Opposites Attract</h1>
                                   <div class="episodes-contens mt-4">
                                      <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 1</a>
                                                  <span class="text-primary">2.25 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 2</a>
                                                  <span class="text-primary">3.23 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 3</a>
                                                  <span class="text-primary">2 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 4</a>
                                                  <span class="text-primary">1.12 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 5</a>
                                                  <span class="text-primary">2.54 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <div id="trending-data20" class="overlay-tab tab-pane fade">
                                <div
                                   class="trending-info align-items-center w-100 animated fadeInUp">
                                   <a href="javascript:void(0);" tabindex="0">
                                      <div class="channel-logo">
                                         <img src="{{asset('site/images/logo.png')}}" class="c-logo" alt="stramit">
                                      </div>
                                   </a>
                                   <h1 class="trending-text big-title text-uppercase">Opposites Attract</h1>
                                   <div class="episodes-contens mt-4">
                                      <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 1</a>
                                                  <span class="text-primary">2.25 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 2</a>
                                                  <span class="text-primary">3.23 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 3</a>
                                                  <span class="text-primary">2 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 4</a>
                                                  <span class="text-primary">1.12 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 5</a>
                                                  <span class="text-primary">2.54 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </li>
                 <li>
                    <div class="tranding-block position-relative"
                       style="background-image: url(images/trending/06.jpg);">
                       <div class="trending-custom-tab">
                          <div class="tab-title-info position-relative">
                             <ul class="trending-pills d-flex nav nav-pills justify-content-center align-items-center text-center"
                                role="tablist">
                                <li class="nav-item">
                                   <a class="nav-link active show" data-toggle="pill" href="#trending-data21"
                                      role="tab" aria-selected="true">Overview</a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" data-toggle="pill" href="#trending-data22" role="tab"
                                      aria-selected="false">Episodes</a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" data-toggle="pill" href="#trending-data23" role="tab"
                                      aria-selected="false">Trailers</a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" data-toggle="pill" href="#trending-data24" role="tab"
                                      aria-selected="false">Similar
                                   Like This</a>
                                </li>
                             </ul>
                          </div>
                          <div class="trending-content">
                             <div id="trending-data21" class="overview-tab tab-pane fade active show">
                                <div
                                   class="trending-info align-items-center w-100 animated fadeInUp">
                                   <a href="javascript:void(0);" tabindex="0">
                                      <div class="res-logo">
                                         <div class="channel-logo">
                                            <img src="{{asset('site/images/logo.png')}}" class="c-logo" alt="streamit">
                                         </div>
                                      </div>
                                   </a>
                                   <h1 class="trending-text big-title text-uppercase">Fire Storm</h1>
                                   <div class="d-flex align-items-center text-white text-detail">
                                      <span class="badge badge-secondary p-3">17+</span>
                                      <span class="ml-3">2 Seasons</span>
                                      <span class="trending-year">2020</span>
                                   </div>
                                   <div class="d-flex align-items-center series mb-4">
                                      <a href="javascript:void(0);"><img src="{{asset('site/images/trending/trending-label.png')}}"
                                         class="img-fluid" alt=""></a>
                                      <span class="text-gold ml-3">#2 in Series Today</span>
                                   </div>
                                   <p class="trending-dec">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                                      dummy text ever since the 1500s.
                                   </p>
                                   <div class="p-btns">
                                      <div class="d-flex align-items-center p-0">
                                         <a href="show-details.html" class="btn btn-hover mr-2" tabindex="0"><i
                                            class="fa fa-play mr-2" aria-hidden="true"></i>Play Now</a>
                                         <a href="javascript:void(0);" class="btn btn-link" tabindex="0"><i class="ri-add-line"></i>My
                                         List</a>
                                      </div>
                                   </div>
                                   <div class="trending-list mt-4">
                                      <div class="text-primary title">Starring: <span class="text-body">Wagner
                                         Moura, Boyd Holbrook, Joanna</span>
                                      </div>
                                      <div class="text-primary title">Genres: <span class="text-body">Crime,
                                         Action, Thriller, Biography</span>
                                      </div>
                                      <div class="text-primary title">This Is: <span class="text-body">Violent,
                                         Forceful</span>
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <div id="trending-data22" class="overlay-tab tab-pane fade">
                                <div
                                   class="trending-info align-items-center w-100 animated fadeInUp">
                                   <a href="show-details.html" tabindex="0">
                                      <div class="channel-logo">
                                         <img src="{{asset('site/images/logo.png')}}" class="c-logo" alt="stramit">
                                      </div>
                                   </a>
                                   <h1 class="trending-text big-title text-uppercase">Fire Storm</h1>
                                   <div class="d-flex align-items-center text-white text-detail mb-4">
                                      <span class="season_date">
                                          2 Seasons
                                      </span>
                                           <span class="trending-year">Feb 2019</span>
                                   </div>

                                   <div class="iq-custom-select d-inline-block sea-epi">
                                      <select name="cars" class="form-control season-select">
                                         <option value="season1">Season 1</option>
                                         <option value="season2">Season 2</option>
                                      </select>
                                   </div>
                                   <div class="episodes-contens mt-4">
                                      <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 1</a>
                                                  <span class="text-primary">2.25 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                               </a>
                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 2</a>
                                                  <span class="text-primary">3.23 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                               </a>
                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 3</a>
                                                  <span class="text-primary">2 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                               </a>
                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 4</a>
                                                  <span class="text-primary">1.12 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                               </a>
                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 5</a>
                                                  <span class="text-primary">2.54 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <div id="trending-data23" class="overlay-tab tab-pane fade">
                                <div
                                   class="trending-info align-items-center w-100 animated fadeInUp">
                                   <a href="javascript:void(0);" tabindex="0">
                                      <div class="channel-logo">
                                         <img src="{{asset('site/images/logo.png')}}" class="c-logo" alt="stramit">
                                      </div>
                                   </a>
                                   <h1 class="trending-text big-title text-uppercase">Fire Storm</h1>
                                   <div class="episodes-contens mt-4">
                                      <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 1</a>
                                                  <span class="text-primary">2.25 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 2</a>
                                                  <span class="text-primary">3.23 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 3</a>
                                                  <span class="text-primary">2 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 4</a>
                                                  <span class="text-primary">1.12 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="watch-video.html" target="_blank">
                                               <img src="{{asset('site/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="watch-video.html" target="_blank" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="watch-video.html" target="_blank">Trailer 5</a>
                                                  <span class="text-primary">2.54 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <div id="trending-data24" class="overlay-tab tab-pane fade">
                                <div
                                   class="trending-info align-items-center w-100 animated fadeInUp">
                                   <a href="javascript:void(0);" tabindex="0">
                                      <div class="channel-logo">
                                         <img src="{{asset('site/images/logo.png')}}" class="c-logo" alt="stramit">
                                      </div>
                                   </a>
                                   <h1 class="trending-text big-title text-uppercase">Fire Storm</h1>
                                   <div class="episodes-contens mt-4">
                                      <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 mb-0">
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/01.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 1</a>
                                                  <span class="text-primary">2.25 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/02.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 2</a>
                                                  <span class="text-primary">3.23 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/03.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 3</a>
                                                  <span class="text-primary">2 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/04.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 4</a>
                                                  <span class="text-primary">1.12 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                         <div class="e-item">
                                            <div class="block-image position-relative">
                                               <a href="show-details.html">
                                               <img src="{{asset('site/images/episodes/05.jpg')}}" class="img-fluid" alt="">
                                               </a>

                                               <div class="episode-play-info">
                                                  <div class="episode-play">
                                                     <a href="show-details.html" tabindex="0"><i
                                                        class="ri-play-fill"></i></a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="episodes-description text-body">
                                               <div class="d-flex align-items-center justify-content-between">
                                                  <a href="show-details.html">Episode 5</a>
                                                  <span class="text-primary">2.54 m</span>
                                               </div>
                                               <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                               </p>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </li>
              </ul>
           </div>
        </div>
     </div>
  </div>
</section> --}}
{{-- <section id="iq-tvthrillers" class="s-margin">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12 overflow-hidden">
            <div class="iq-main-header d-flex align-items-center justify-content-between">
               <h4 class="main-title">Recommended For You</h4>
               <a class="iq-view-all" href="movie-category.html">View All</a>
            </div>
            <div class="tvthrillers-contens">
               <ul class="favorites-slider list-inline row p-0 mb-0">
                  <li class="slide-item">

                        <div class="block-images position-relative">
                           <div class="img-box">
                              <img src="images/tvthrillers/01.jpg" class="img-fluid" alt="">
                           </div>
                           <div class="block-description">
                              <h6 class="iq-title"><a href="show-details.html">Day of Darkness</a></h6>
                              <div class="movie-time d-flex align-items-center my-2">
                                 <div class="badge badge-secondary p-1 mr-2">15+</div>
                                 <span class="text-white">2 Seasons</span>
                              </div>
                              <div class="hover-buttons">
                                 <span class="btn btn-hover iq-button"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                 Play Now</span>
                              </div>
                           </div>
                           <div class="block-social-info">
                              <ul class="list-inline p-0 m-0 music-play-lists">
                                 <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/" target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading" target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i class="ri-twitter-fill"></i></a>
                                             <a href="#" data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/" class="share-ico iq-copy-link" tabindex="0"><i class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                 <li><span><i class="ri-heart-fill"></i></span>
                                 <span class="count-box">19+</span></li>
                                 <li><span><i class="ri-add-line"></i></span></li>
                              </ul>
                           </div>
                        </div>

                  </li>
                  <li class="slide-item">

                        <div class="block-images position-relative">
                           <div class="img-box">
                              <img src="images/tvthrillers/02.jpg" class="img-fluid" alt="">
                           </div>
                           <div class="block-description">
                              <h6 class="iq-title"><a href="show-details.html">My True Friends</a></h6>
                              <div class="movie-time d-flex align-items-center my-2">
                                 <div class="badge badge-secondary p-1 mr-2">7+</div>
                                 <span class="text-white">2 Seasons</span>
                              </div>
                              <div class="hover-buttons">
                                 <span class="btn btn-hover iq-button"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                 Play Now</span>
                              </div>
                           </div>
                           <div class="block-social-info">
                              <ul class="list-inline p-0 m-0 music-play-lists">
                                 <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/" target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading" target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i class="ri-twitter-fill"></i></a>
                                             <a href="#" data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/" class="share-ico iq-copy-link" tabindex="0"><i class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                 <li><span><i class="ri-heart-fill"></i></span>
                                 <span class="count-box">19+</span></li>
                                 <li><span><i class="ri-add-line"></i></span></li>
                              </ul>
                           </div>
                        </div>

                  </li>
                  <li class="slide-item">

                        <div class="block-images position-relative">
                           <div class="img-box">
                              <img src="images/tvthrillers/03.jpg" class="img-fluid" alt="">
                           </div>
                           <div class="block-description">
                              <h6 class="iq-title"><a href="show-details.html">Arrival 1999</a></h6>
                              <div class="movie-time d-flex align-items-center my-2">
                                 <div class="badge badge-secondary p-1 mr-2">11+</div>
                                 <span class="text-white">3 Seasons</span>
                              </div>
                              <div class="hover-buttons">
                                 <span class="btn btn-hover iq-button"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                 Play Now</span>
                              </div>
                           </div>
                           <div class="block-social-info">
                              <ul class="list-inline p-0 m-0 music-play-lists">
                                 <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/" target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading" target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i class="ri-twitter-fill"></i></a>
                                             <a href="#" data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/" class="share-ico iq-copy-link" tabindex="0"><i class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                 <li><span><i class="ri-heart-fill"></i></span>
                                 <span class="count-box">19+</span></li>
                                 <li><span><i class="ri-add-line"></i></span></li>
                              </ul>
                           </div>
                        </div>

                  </li>
                  <li class="slide-item">

                        <div class="block-images position-relative">
                           <div class="img-box">
                              <img src="images/tvthrillers/04.jpg" class="img-fluid" alt="">
                           </div>
                           <div class="block-description">
                              <h6 class="iq-title"><a href="show-details.html">Night Mare</a></h6>
                              <div class="movie-time d-flex align-items-center my-2">
                                 <div class="badge badge-secondary p-1 mr-2">18+</div>
                                 <span class="text-white">3 Seasons</span>
                              </div>
                              <div class="hover-buttons">
                                 <span class="btn btn-hover iq-button"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                 Play Now</span>
                              </div>
                           </div>
                           <div class="block-social-info">
                              <ul class="list-inline p-0 m-0 music-play-lists">
                                 <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/" target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading" target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i class="ri-twitter-fill"></i></a>
                                             <a href="#" data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/" class="share-ico iq-copy-link" tabindex="0"><i class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                 <li><span><i class="ri-heart-fill"></i></span>
                                 <span class="count-box">19+</span></li>
                                 <li><span><i class="ri-add-line"></i></span></li>
                              </ul>
                           </div>
                        </div>

                  </li>
                  <li class="slide-item">

                        <div class="block-images position-relative">
                           <div class="img-box">
                              <img src="images/tvthrillers/05.jpg" class="img-fluid" alt="">
                           </div>
                           <div class="block-description">
                              <h6 class="iq-title"><a href="show-details.html">The Marshal King</a></h6>
                              <div class="movie-time d-flex align-items-center my-2">
                                 <div class="badge badge-secondary p-1 mr-2">17+</div>
                                 <span class="text-white">1 Season</span>
                              </div>
                              <div class="hover-buttons">
                                 <span class="btn btn-hover iq-button"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                 Play Now</span>
                              </div>
                           </div>
                           <div class="block-social-info">
                              <ul class="list-inline p-0 m-0 music-play-lists">
                                 <li class="share">
                                       <span><i class="ri-share-fill"></i></span>
                                       <div class="share-box">
                                          <div class="d-flex align-items-center">
                                             <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/" target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i class="ri-facebook-fill"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text=Currentlyreading" target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i class="ri-twitter-fill"></i></a>
                                             <a href="#" data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/" class="share-ico iq-copy-link" tabindex="0"><i class="ri-links-fill"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                 <li><span><i class="ri-heart-fill"></i></span>
                                 <span class="count-box">19+</span></li>
                                 <li><span><i class="ri-add-line"></i></span></li>
                              </ul>
                           </div>
                        </div>

                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section> --}}
@endsection