@extends('site.layout')
@section('title')
  {{ label('lbl_site_title') }} - {{ label('lbl_home') }}
@endsection

@section('content')

<div class="home-page-bodyyyy position-relative"> 

  <div class="bg-light position-relative d-noneeeee">
    <div class="w-100 top-left position-absolute bg-gradient-primary-transparent" style="opacity: 0.5; height:50%; transform: scaleY(1);"></div>
    <div class="h-100 w-100 top-left position-absolute bg-gradient-primary-transparent" style="opacity: 0.2; transform: scaleY(-1);"></div>
    <div class="home-slider  position-relative ">
   
      @if(count($slideshow))
        <div class="slider-holder slider-bg has-show-on-hover">
          <div id="homeCarousel" class="carousel slide carousel-fade h-100 bg-secondary divide position-relative" data-ride="carousel">
            <!-- <ol class="carousel-indicators">
              <li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#homeCarousel" data-slide-to="1"></li>
              <li data-target="#homeCarousel" data-slide-to="2"></li>
            </ol> -->
            <div class="slider-nav-controls show-on-hover w-100 px-3  position-absolute">
              <div class="slider-nav-arrows " >
                <span class="nav-control border-0 p-33 hover-icon-left hover-bgg   float-left" href="#homeCarousel" role="button" data-slide="prev">
                  <!-- <span class="icon" aria-hidden="true"> <i class="fa fa-chevron-left "></i></span> -->
                  <div class="icon box-30"> 
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 91.6">
                      <polygon class="stroke-white"  points="52.51 45.8 77.5 2.5 2.5 45.8 77.5 89.1 52.51 45.8"/>
                    </svg>
                  </div>
                  <span class="sr-only">Previous</span>
                </span>
                <span class="nav-control border-0 hover-icon-right hover-bgg p-33  float-right" href="#homeCarousel" role="button" data-slide="next">
                  <!-- <span class="icon" aria-hidden="true"> <i class="fa fa-chevron-right "></i></span> -->
                  <div class="icon box-30"> 
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 91.6">
                      <polygon class="nav-arrows stroke-white" points="27.49 45.8 2.5 2.5 77.5 45.8 2.5 89.1 27.49 45.8"/>
                    </svg>
                    </div>
                  <span class="sr-only">Next</span>
                </span>
              </div>
            </div>
            <div class="carousel-inner ">
              @foreach($slideshow as $key => $photo)
              <div class="carousel-item @if ($key == 0) active  @endif" >    
                <div class="full-hd-container parallax-banner background-image" style="background-image:url('{{asset('uploads/gallery/'.$photo->filename)}}')"
                  data-offset="230px" data-rate="0.15">
                  {{-- <img class="d-block w-100" src="{{asset('uploads/gallery/'.$photo->filename)}}" alt="First slide"> --}}
                </div>                  
                <div class="bg-primary-very-faded cursor-pointer top-left h-100 w-100 p-2 px-lg-4 carousel-text  d-flex align-items-center ">
                    <div class="bg-secondary h-100 w-100 position-absolute top-left" style="opacity: 0.2"> </div>
                    <h2 class="d-none d-sm-block w-100 max-width-480 text-white text-bold text-center position-relative"> {{ str_limit(strip_tags($photo->content),60) }}</h2>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      @endif

      <!-- quick scroll -->
      <span class=" scroll-to-content text-white position-absolute cursor-pointer box-40 "  >
        <!-- <i class="fa fa-chevron-down"></i> -->
        <svg xmlns="http://www.w3.org/2000/svg" class="mt-5" viewBox="0 0 90.55 50.67"><polygon class="stroke-white " points="45.27 17.54 1.97 1.97 45.27 48.69 88.58 1.97 45.27 17.54"/></g></g></svg>
      </span>
      <!-- an anchor for scrolling to content -->
      <span class="position-absolute" style="height:0px; width:0px; bottom:25%" id="homeContentTether"></span>
  </div>
  
  @if(count($products))
    <div class="d-none d-flexxx scrolling-text text-accent py-1 pr-lg-5  bg-light-dark border-bottom-faded  w-100 align-items-center">
      <marquee class="col"  onMouseOver="this.stop()" onMouseOut="this.start()" scrollamount="5">
        @foreach($products as $key => $product)
        <span class="d-inline-block pr-5"> 
          <span class="fa fa-asterisk px-3 text-secondary"> </span>
            <span class="faded">{{label('lbl_product')}} :</span>
            <span> {{strip_tags($product->title)}} </span>
            @if(isset($product->lowest_price))
              <span class="faded px-2"> | </span> <span class="faded">{{label('lbl_price')}} :</span>
              <span> {{strip_tags($product->lowest_price)}} - {{strip_tags($product->highest_price)}}  </span>
            @endif
            @if(isset($product->quantity))
              <span class="faded px-2"> | </span> <span class="faded">{{label('lbl_quantity')}} :</span>
              <span> {{strip_tags($product->quantity)}}</span>
            @endif
            @if(isset($product->season))
              <span class="faded px-2"> | </span> <span class="faded">{{label('lbl_season')}} :</span>
              <span> {{strip_tags($product->season)}}</span>
            
            @endif
             @if(isset($product->location))
              <span class="faded px-2"> | </span> <span class="faded">{{label('lbl_location')}} :</span>
              <span> {{strip_tags($product->location)}} </span>
            
            @endif
            <span class="faded px-2"> | </span> <span class="faded">{{label('lbl_category')}} :</span>
            <span>{{strip_tags($product->category->title)}}  </span>
          <span class="fa fa-asterisk px-2 text-secondary"></span> 
        </span>
        @endforeach
      </marquee>
      <div class="pr-4">
        <a href="{{url('/products')}}" class="readmore border mr-lg-4 box-shadow-slight bg-white border d-inline-block px-3 py-1  text-primary  cursor-pointer  ">
          <span> {{label('lbl_readmore')}} </span>
          <i class="fa fa-chevron-right"></i>
        </a>  
      </div>
    </div>
  @endif

  <div class="home-content  bg-white ">
    <div class="bg-white d-noneeee  ">
      <div class="container px-lg-444 pt-4 pt-lg-5"> 
        <div class="row  mx-0">
          <div class="col-lg-12 mx-auto pb-4 pr-lg-4  has-shifting-underline">
            <div class="">
              <a href="{{url('welcome')}}" class="d-block text-bold ">
                <h6 class="pb-3 pb-lg-3 section-heading  text-centerrr"> 
                    <div class="pr-sm-2 py-1 text-uppercase text-primary max-width-360  d-inline-block position-relative"> 
                      <!-- <i class="fa fa-cog pr-2  align-self-center"></i>  -->
                      <span class="d-inline-block pb-2 position-relative text-bold ">
                        <span class="">{{label('lbl_welcome_note')}}</span> 
                        <div class="d-flex w-100  position-absolute bottom-left">
                          <div class="shifting-underline-1 padding-1 bg-secondary"></div>
                          <div class="shifting-underline-2 padding-1 bg-primary"></div>
                        </div>
                      </span>
                    </div>
                </h6>  
              </a> 
            </div>
            <div class=" my-2 mb-3 text-dark">
              @if($welcomeNote)
                <div class="">{{str_limit(strip_tags($welcomeNote->content),300)}}</div>
                <div class="d-block mt-2">
                  <a href="{{url('welcome')}}" class="readmore border rounded-large  d-inline-block px-3 py-1  box-shadow-slight text-primary hover-bg-primary cursor-pointer  ">
                    <span> {{label("lbl_readmore")}} </span>
                    <i class="fa fa-chevron-right"></i>
                  </a>  
                </div>
              @endif
            </div>
            <div class="owl-carousel has-show-on-hover owl-theme owl-loaded parallax-banner position-relative"
            style="background:url('images/bg/bg0.jpg'); background-size:cover; background-repeat: no-repeat;" data-offset="600px" data-rate="0.15">
              <div class="bg-radial-gradient-transparent-white h-100 w-100 position-absolute top-left"></div>
              <div class="bg-white h-100 w-100 position-absolute top-left faded"></div>
              <div class="owl-stage-outer " >
                <div class="owl-stage " style="display:flex">
                  @foreach($latest_documents as $key => $document)
                    <div class="owl-item text-center p-2 has-hover-bounce last-no-border-element text-center position-relative" >
                      <a href="{{ url('/'.$document->category->slug)}}" class="bg-gradient-primary-secondary-white  box-shadow-slightt d-block p-2">
                        <div class="py-3  d-flex h-100 justify-content-center position-relative align-items-center ">
                          <div class="border-primary border-width-3 round d-flex 
                              position-absolute justify-content-center align-items-center m-auto box-60">
                          </div>
                          <div class="ring d-flex position-absolute justify-content-center align-items-center m-auto box-50">
                            <div class="h-100 round w-100 position-relative d-inline-block" 
                            style="background-image:urlll('{{$document->image}}'); background-size:cover; background-position: center;">
                            </div> 
                          </div>
                          <div class="round bg-primary d-flex position-absolute
                           justify-content-center align-items-center m-auto box-50"></div>
                           <?php $file_path = (strpos($document->category->title, 'paper') !== false)  ? "site/images/svgs/form.svg":"site/images/svgs/document.svg" ?>
                          <img src="{{ asset($file_path) }}" class="hover-bounce white-icon" style="width: 30px; height:auto">
                        </div> 
                        <div class="text-bold text-primary small mt-2">
                          <span class="bg-white-transparentt d-inline-block p-1 rounded-slight">
                            <span class="px-1"> {{$document->title}} </span> |  <span class="px-1 faded"> {{$document->category->title}} </span> 
                          </span>
                        </div>
                      </a>
                    </div>
                  @endforeach
                </div>
                
                <div class="owl-controls  pt-4"></div>
                <!-- get button here -->
                <!-- <div class="d-none " >
                  <span class="hover-icon-left show-on-hover owl-prev-template">
                    <div class="icon box-30"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 91.6"><polygon class="fill-primary"  points="52.51 45.8 77.5 2.5 2.5 45.8 77.5 89.1 52.51 45.8"/></svg></div>
                  </span>
                  <span class="hover-icon-right show-on-hover owl-next-template">
                    <div class="icon box-30 "> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 91.6"><polygon class="fill-primary" points="27.49 45.8 2.5 2.5 77.5 45.8 2.5 89.1 27.49 45.8"/></svg></div>
                  </span>
                </div> -->
              </div>
              <div class="custom-owl-nav bg-danger overflow-visible position-absolute w-100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-dark-lightttt py-4 pb-5 parallax-banner position-relative d-noneeee" style="background:url({{asset('site/images/bg/bg6.jpg')}}); background-size:cover; background-repeat: no-repeat;" 
      data-offset="250px" data-rate="0.2">
      <div class="bg-gradient-transparent-white-faded position-absolute top-left h-100 w-100" style="opacity:0.8"></div>
      <div class="container px-lg-4444 has-shifting-underline">
          <div class=" overflow-hidden ">
            <div class="d-block">
              <h6 class="pb-3 pb-lg-4 section-heading"> 
                <a  href="{{url('/news')}}" class=" text-uppercase text-primary hover-text-primary bg-white-transparent-hover-secondary
                 d-inline-block position-relative"> 
                  <!-- <i class="fa fa-cog pr-2  align-self-center"></i>  -->
                  <span class="d-inline-block py-2 position-relative text-bold text-primary">
                    <span class="px-2222">{{label('lbl_news_and_events')}}</span>
                    <span class="position-absolute view-all">
                      <i class="fa fa-arrow-right"> </i>
                      <span class="text-small text-nowrap d-inline-block pl-2 ">{{label('lbl_view_all')}} </span> 
                    </span> 
                    <div class="d-flex w-100 position-absolute bottom-left">
                      <div class="shifting-underline-1 padding-1 bg-secondary"></div>
                      <div class="shifting-underline-2 padding-1 bg-primary"></div>
                    </div>
                  </span>
                </a>
              </h6> 
            </div>        
            <div class="row p-0 position-relative mt-2 mx-0">
              @if(count($news_list))
              <?php $news = $news_list[0] ?>
              <div class="col-md-6 col-lg-6 d-flex px-0 pr-lg-4  flex-column justify-content-between">
                <div class="box-shadow h-100 mb-4 rounded-smallll border-none overflow-hidden  bg-white show-more-content-news">
                  <a href="{{url('/news/'.$news->slug)}}" class="zoom-container">
                    <div class="overflow-hidden full-hd-container position-relative bg-secondary">
                      <img class="card-img-top image" src="{{asset('uploads/news/'.$news->photo_url)}}" alt="Card image cap">
                      <div class="dark-overlay"></div>
                    </div>
                    <div class="position-relative h-100">
                      <div class="p-3 px-4 bg-white content text-dark">
                        <div class="">
                          <h6 class="card-text text-muted pb-3 small text-primary">{!! date('d M Y', strtotime($news->created_at)) !!} </h6>
                          <h6 class="card-text text-bold">{{str_limit($news->title,40)}}</h6>                                    
                        </div>  
                        <div class="card-text px-4 more-content">
                          <div class="text"> {{str_limit(strip_tags($news->content),80)}} </div>
                        </div> 
                      </div>                               
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-6 col-lg-6 d-flex px-0 px-md-3  pb-3 mb-1 pl-lg-3 flex-column ">
                @foreach($news_list as $key => $news)
                  @if($key > 0)
                    <a href="{{url('/news/'.$news->slug)}}" class="col mb-1 cursor-pointer zoom-container show-more-content-news p-0 d-flex border-bottom box-shadow  bg-white last-no-border align-items-center "  style="min-height:140px"> 
                      <div class="col-3 col-md-4 px-0 text-center d-flex flex-column justify-content-center pr-0 border-rightt " >
                        <div class="overflow-hidden box-shadow-slight">
                          <div class="square-container  image my-0 hover-text-primary background-image" 
                            style="background-image:url('{{asset('/uploads/news/'.$news->photo_url)}}'); " >  
                            <div class="dark-overlay"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-9 col-md-8 pl-3 "> 
                        {{-- <h6> <span class="text-bold">{{str_limit($news->title,40)}}</span> </h6>  --}}
                        <div class=""><span class="small text-faded ">{!! date('d M Y', strtotime($news->created_at)) !!}</span></div>
                        <div class="hover-text-primary ">{{str_limit(strip_tags($news->title),60)}}</div>
                      </div>
                    </a>
                  @endif
                @endforeach
              </div>
            </div>
            @endif
          </div>          
      </div>
    </div>


  </div>


</div>

@stop
