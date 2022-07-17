

<header class="col-12 px-0  mb-0 bg-header-trans bg-radial-gradient-transparent-white-inverteddd position-relative" 
  style="z-index:999;">
  <div class="faded h-100 w-100 position-absolute top-left bg-white parallax-banner" 
    style=" background:urllll({{asset('site/images/flag.jpg')}}); background-size: cover; background-position: center;"
  data-offset="80px"></div>
  <div class="header-bg h-100 w-100 position-absolute top-left"></div>
  <div class="header-bg-2 h-100 w-100 position-absolute top-left"></div>

  <!-- top navbar -->
  <div class="col-12  bg-dark-fadeddd ">
    <div class="container px-0">
      <div class="row top_nav px-0">
        <div class="col-12 px-0 text-accent mx-auto justify-content-end align-items-center">
          <div class="d-flex d-none text-accent text-bold justify-content-end padd-items-h-5  py-0 pb-0 align-items-center" >
            <ul class="d-none my-0 d-lg-flex align-items-center ">
              {!! App\Models\MenuItem::getMenu('top_menu') !!}
            </ul>
            <ul class=" my-0 d-flex align-items-center ">
              <li class="list-inline-item px-2 @if(curlang() == '_en') d-none @endif  ">
                <a title="Switch Language to English" href="{{ url('language/en') }}">
                  ENGLISH
                </a>
              </li>
              <li class="list-inline-item pr-2 @if(curlang() == '_sw') d-none @endif">
                <a title="Switch Language to swahili" href="{{ url('language/sw') }}">
                  KISWAHILI
                </a>
              </li>   
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /top navbar -->

  <!-- top middle -->
  <div class="px-0 pb-2 position-relative bg-header-trans">
    <div class="col-md-12 mt-0 py-111 top-middle   ">
      <div class="container px-0 position-relative">
        <div class="row">
          <div class="col-3 col-lg-2 float-left text-left my-auto">
            <a href="{{ url('/') }}">
              <img src="{{asset('site/images/logo.png')}}" alt="HST Logo" class="mx-auto img-fluid" style="width: 80px" />
            </a>
          </div>
          <div class="col-6 col-lg-8 text-center my-auto">
            <div class="p-2 px-4">
              {{-- <div class="mb-1 small text-shadow-light text-accent d-none d-md-block title font-weight-bold align-items-center ">
                {{ label("lbl_site_title")}}
              </div> --}}
              <h3 class="mb-0 text-shadow-lightttt text-center text-bold titleeee align-items-center text-primary">            
                {{ label("lbl_site_subtitle")}}
              </h3>
            </div>
          </div>
          {{-- <div class="col-3 col-lg-2  float-right text-right my-auto d-flex justify-content-end align-items-center">       
            <a href="{{ url('/') }}"><img src="{{asset('site/images/logo.png')}}" alt="WCF Logo" class="mx-auto img-fluid fade-on" style="width:80px"/></a>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
   <!-- top middle -->

  {{-- <div class="bg-secondary position-relative" style="height:2px; z-index: 3;"></div> --}}
  <!-- top bottom -->
  <div class="col-12 px-0 bg-white top-fixed border-bottom-primary border-width-2" style="padding-bottom:2px; margin-bottom:2px;">
    <div class="col-md-12 col-xs-12 main-menu  bg-primary d-flex border-top border-left-secondary-thickkk position-relative active justify-content-center align-items-center"
    style="border-left-width:10px !important; --order:3">
      <!-- HEADER -->
      <nav class="navbar main-navigation medium-text p-0 fade-on mx-lg-5 justify-content-start align-items-center" id='cssmenu' >
        <div id="head-mobile"></div>
        <div class="menu-button text-hover-secondary text-white d-flex align-items-center d-lg-none">
          <i class="menu-icon fa fa-bars mr-2" style="font-size: 25px;"></i> 
          <span class=" bold-600">{{label('lbl_menu')}}</span>
        </div>
        <ul class="m-0 capitalize-parent-itemsss d-lg-flex">
          <li class=""><a class="nav-link" href="{{ url('/') }}"> {{label('lbl_home')}} </a></li>
          {!! App\Models\MenuItem::getMenu('main_nav') !!}
        </ul>
      </nav>
      <div class="position-absolute search-toggle top-right text-white text-hover-secondary
      hover-bg-primary d-flex align-items-center p-3" style="height:45px">
       <span class="mt-0 pt-0"><i class="fas fa-search fa-1x"></i></span>
     </div>
      <div class="position-absolute search-toggle bg-primary top-left text-white text-hover-secondary hover-bg-primary h-100 d-flex align-items-center p-1"></div>
      <!-- /HEADER -->
      <div class="search-form-container move-left position-absolute top-left w-100 overflow-hidden" style="z-index: 9999999;">
        <div class="search-form position-absolute top-left h-100 w-100 px-1 p-1  bg-primary-dark box-shadow d-flex 
        align-items-center justify-content-center">
        <form  method="GET" action="{{url('search')}}" autocomplete="off"
          class=" d-flex justisty-content-between rounded-mediumm bg-secondaryy overflow-hiddenn py-0 mx-auto position-relative" action="">
            <div class="h-100 w-100 rounded-large bg-white position-absolute"></div>
            <div class="h-100 w-100 d-flex justisty-content-between  z-index-2">
              <input class="form-control border-0 bg-none text-primary " type="search" placeholder="Search" aria-label="Search" name="q"
                  @if(isset($term)) value="{{$term}}"@endif/>
                <span class="d-flex">
                  <button type="submit" class="search-icon text-primary btn bg-white-transparentt" name="button">
                    <i class="fas fa-search fa-1x"></i>
                  </button>
                  <button type="button" class="text-primary search-toggle border-left fadedd btn bg-white-transparentt" name="button">
                    <i class="fas fa-eye-slash fa-1x"></i>
                  </button>
                </span>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-12 d-lg-none border-bottom-primary"></div>
  </div>
  <div class="bg-white position-absolute z-index-2" style="height: 2px; bottom:0"></div>
  <!-- /top bottom -->

</header>
