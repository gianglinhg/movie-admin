<?php $slide = get_lasted_movies();
?>
<section id="home" class="iq-main-slider p-0">
  <div id="home-slider" class="slider m-0 p-0">
    @foreach($slide as $key => $item)
     <div class="slide slick-bg s-bg-{{$key}}" style="background-image: url({{$item->poster_url}});">
        <div class="container-fluid position-relative h-100">
           <div class="slider-inner h-100">
              <div class="row align-items-center  h-100">
                 <div class="col-xl-6 col-lg-12 col-md-12">
                    <a href="javascript:void(0);">
                       <div class="channel-logo" data-animation-in="fadeInLeft" data-delay-in="0.5">
                          <img src="{{asset('site/images/logo.png')}}" class="c-logo" alt="streamit">
                       </div>
                    </a>
                    <h1 class="slider-text big-title title text-uppercase" data-animation-in="fadeInLeft"
                       data-delay-in="0.6">{{$item->origin_name}}</h1>

                       <div class="d-flex flex-wrap align-items-center fadeInLeft animated" data-animation-in="fadeInLeft" style="opacity: 1;">
                         <div class="slider-ratting d-flex align-items-center mr-4 mt-2 mt-md-3">
                             <ul class="ratting-start p-0 m-0 list-inline text-primary d-flex align-items-center justify-content-left">
                                <li>
                                   <i class="fa fa-star" aria-hidden="true"></i>
                                </li>
                                <li>
                                   <i class="fa fa-star" aria-hidden="true"></i>
                                </li>
                                <li>
                                   <i class="fa fa-star" aria-hidden="true"></i>
                                </li>
                                <li>
                                   <i class="fa fa-star" aria-hidden="true"></i>
                                </li>
                                <li>
                                   <i class="fa fa-star-half" aria-hidden="true"></i>
                                </li>
                             </ul>
                             <span class="text-white ml-2">4.7(lmdb)</span>
                             </div>
                             <div class="d-flex align-items-center mt-2 mt-md-3">
                                <span class="badge badge-secondary p-2">18+</span>
                                <span class="ml-3">2 Seasons</span>
                             </div>
                     </div>

                    <!-- <div class="d-flex align-items-center" data-animation-in="fadeInUp" data-delay-in="1">

                       <span class="badge badge-secondary p-2">18+</span>
                       <span class="ml-3">2 Seasons</span>
                    </div> -->
                    <p data-animation-in="fadeInUp" data-delay-in="1.2">{!! $item->content!!}
                    </p>
                    <div class="trending-list" data-wp_object-in="fadeInUp" data-delay-in="1.2">
                     <div class="text-primary title starring">
                         Starring: <span class="text-body">{{implode(', ', get_select_array($item->actors))}}</span>
                     </div>
                     <div class="text-primary title genres">
                         Director: <span class="text-body">{{implode(', ', get_select_array($item->directors))}}</span>
                     </div>
                     <div class="text-primary title tag">
                         Tag: <span class="text-body">{{implode(', ', get_select_array($item->tags))}}</span>
                     </div>
                 </div>
                    <div class="d-flex align-items-center r-mb-23" data-animation-in="fadeInUp" data-delay-in="1.2">
                       <a href="{{ route('show_single', ['slug' => $item->slug])}}" class="btn btn-hover iq-button"><i class="fa fa-play mr-2"
                          aria-hidden="true"></i>Play Now</a>
                       <a href="{{ route('show_single', ['slug' => $item->slug])}}" class="btn btn-link">More details</a>
                    </div>
                 </div>
              </div>
              <div class="col-xl-5 col-lg-12 col-md-12 trailor-video">
                  @if(!empty($item->trailer_url))
                     <a href="{{$item->trailer_url}}" class="video-open playbtn">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                           x="0px" y="0px" width="80px" height="80px" viewBox="0 0 213.7 213.7"
                           enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                           <polygon class='triangle' fill="none" stroke-width="7" stroke-linecap="round"
                              stroke-linejoin="round" stroke-miterlimit="10"
                              points="73.5,62.5 148.5,105.8 73.5,149.1 " />
                           <circle class='circle' fill="none" stroke-width="7" stroke-linecap="round"
                              stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3" />
                        </svg>
                        <span class="w-trailor">Watch Trailer</span>
                     </a>
                 @endif
              </div>
           </div>
        </div>
     </div>
    @endforeach
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
     <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 44" width="44px" height="44px" id="circle"
        fill="none" stroke="currentColor">
        <circle r="20" cy="22" cx="22" id="test"></circle>
     </symbol>
  </svg>
</section>