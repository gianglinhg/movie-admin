@extends('layouts.site')
@section('site_content')
<section class="banner-wrapper overlay-wrapper iq-main-slider" style="background-image: url('{{$movie->poster_url}}')">
  <div class="banner-caption">
     <div class="position-relative mb-4">
        <a href="{{ route('watch', ['movie' => $movie->slug, 'tap' => $movie->episodes[1]->slug, 'id' => $movie->episodes[1]->id])}}" class="d-flex align-items-center">
           <div class="play-button">
              <i class="fa fa-play"></i>
           </div>
           <h4 class="w-name text-white font-weight-700">Watch latest Episode</h4>
        </a>
     </div>
     <ul class="list-inline p-0 m-0 share-icons music-play-lists">
        <li><span><i class="ri-add-line"></i></span></li>
        <li><span><i class="ri-heart-fill"></i></span></li>
        <li class="share">
           <span><i class="ri-share-fill"></i></span>
           <div class="share-box">
              <div class="d-flex align-items-center">
                 <a href="#" class="share-ico"><i class="ri-facebook-fill"></i></a>
                 <a href="#" class="share-ico"><i class="ri-twitter-fill"></i></a>
                 <a href="#" class="share-ico"><i class="ri-links-fill"></i></a>
              </div>
           </div>
        </li>
     </ul>
  </div>
</section>
<div class="main-content" data-select2-id="6">
  <section class="movie-detail container-fluid">
     <div class="row">
        <div class="col-lg-12">
           <div class="trending-info g-border">
              <h1 class="trending-text big-title text-uppercase mt-0">{{$movie->origin_name}}</h1>
              <ul class="p-0 list-inline d-flex align-items-center movie-content">
                 <li class="text-white">Action</li>
                 <li class="text-white">Drama</li>
              </ul>
              <div class="d-flex align-items-center text-white text-detail">
                 <span class="badge badge-secondary p-3">18+</span>
                 <span class="ml-3">3 Seasons</span>
                 <span class="trending-year">2020</span>
              </div>
              <div class="d-flex align-items-center series mb-4">
                 <a href="javascript:void();"><img src="images/trending/trending-label.png" class="img-fluid" alt=""></a>
                 <span class="text-gold ml-3">#2 in Series Today</span>
              </div>
              <p class="trending-dec w-100 mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                 industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                 unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                 survived not only five centuries.</p>
           </div>
        </div>
     </div>
  </section>
  <section class="container-fluid seasons" data-select2-id="5">
     <div class="iq-custom-select d-inline-block sea-epi s-margin">
        <select name="cars" class="form-control season-select select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
           <option value="season1" data-select2-id="3">Season 1</option>
           <option value="season2" data-select2-id="9">Season 2</option>
           <option value="season3" data-select2-id="10">Season 3</option>
        </select><span class="select2 select2-container select2-container--bootstrap4 select2-container--below select2-container--focus" dir="ltr" data-select2-id="2" style="width: 150px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-cars-gq-container"><span class="select2-selection__rendered" id="select2-cars-gq-container" role="textbox" aria-readonly="true" title="Season 1">Season 1</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
     </div>
     <ul class="trending-pills d-flex nav nav-pills align-items-center text-center s-margin" role="tablist">
        <li class="nav-item">
           <a class="nav-link active show" data-toggle="pill" href="#episodes" role="tab" aria-selected="true">Episodes</a>
        </li>
        <li class="nav-item">
           <a class="nav-link" data-toggle="pill" href="#popularclips" role="tab" aria-selected="false">Popular
              Clips</a>
        </li>
     </ul>
     <div class="tab-content">
        <div id="episodes" class="tab-pane fade active show" role="tabpanel">
           <div class="block-space">
              <div class="row">
                 <div class="col-1-5 col-md-6 iq-mb-30">
                    <div class="epi-box">
                       <div class="epi-img position-relative">
                          <img src="images/episodes/01.jpg" class="img-fluid img-zoom" alt="">
                          <div class="episode-number">1</div>
                          <div class="episode-play-info">
                             <div class="episode-play">
                                <a href="show-details.html">
                                   <i class="ri-play-fill"></i>
                                </a>
                             </div>
                          </div>
                       </div>
                       <div class="epi-desc p-3">
                          <div class="d-flex align-items-center justify-content-between">
                             <span class="text-white">11 Aug 20</span>
                             <span class="text-primary">30m</span>
                          </div>
                          <a href="show-details.html">
                             <h6 class="epi-name text-white mb-0">Lorem Ipsum is simply dummy text
                             </h6>
                          </a>
                       </div>
                    </div>
                 </div> <!-- Có 10 cái -->
              </div>
           </div>
        </div>
        <div id="popularclips" class="tab-pane fade" role="tabpanel">
           <div class="block-space">
              <div class="row">
                 <div class="col-1-5 col-md-6 iq-mb-30">
                    <div class="epi-box">
                       <div class="epi-img position-relative">
                          <img src="images/episodes/01.jpg" class="img-fluid img-zoom" alt="">
                          <div class="episode-number">1</div>
                          <div class="episode-play-info">
                             <div class="episode-play">
                                <a href="show-details.html">
                                   <i class="ri-play-fill"></i>
                                </a>
                             </div>
                          </div>
                       </div>
                       <div class="epi-desc p-3">
                          <div class="d-flex align-items-center justify-content-between">
                             <span class="text-white">11 Aug 20</span>
                             <span class="text-primary">30m</span>
                          </div>
                          <a href="show-details.html">
                             <h6 class="epi-name text-white mb-0">Lorem Ipsum is simply dummy text
                             </h6>
                          </a>
                       </div>
                    </div>
                 </div> <!-- Có 5 cái -->
              </div>
           </div>
        </div>
     </div>
  </section>
</div>
@endsection