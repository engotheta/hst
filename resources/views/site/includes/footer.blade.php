
<footer class="ega-footer parallax-banner  pb-0 pt-4  position-relative"
  style="background:url({{asset('site/images/bg/bg7.jpg')}}); background-size:cover; background-repeat: no-repeat;"
  data-offset="400px" data-rate="0.1">

  <div class="bg-gradient-with-transparent h-100 w-100 bg position-absolute top-left"> </div>
  {{-- <span class="scroll-to-top has-hover-bounce bg-none border-0 text-white cursor-pointer  " style="transform:translateY(-20px)">
    <div class="p-2 round d-flex justify-content-center position-relative align-items-center box-60">
      <div class="round border-width-3 border border-color-primary d-flex position-absolute 
          justify-content-center align-items-center m-auto  borderrr  box-70"  >
      </div>
      <div class="bg-primary round d-flex position-absolute justify-content-center align-items-center m-auto box-60"  >
      </div>
      <span class="d-inline-block box-40 position-relative z-index-2" style="transform: scaleY(-1); top:-10px">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90.55 50.67" class="hover-bounce" ><polygon class="stroke-white" points="45.27 17.54 1.97 1.97 45.27 48.69 88.58 1.97 45.27 17.54"/></svg>
      </span>
    </div> 
  </span> --}}
  <div class="main-container container px-lg-5">
    <div class="row pb-3">

      <div class="col-md-4 text-center text-lg-left pr-lg-4 has-shifting-underline">
        @if (!empty($headquarter))
          <h6 class="footer-heading position-relative text-white d-inline-block pb-2 mb-4 text-uppercase">
            {{label('lbl_contact')}}
            <div class="d-flex w-100  position-absolute bottom-left">
              <div class="shifting-underline-1 padding-1 bg-secondary"></div>
              <div class="shifting-underline-2 padding-1 bg-primary"></div>
            </div>
          </h6>   
          <p class="my-1">{{ label('lbl_site_title') }}</p>
          <p class="my-1">{{ label('lbl_site_subtitle') }} </p>
          @if($headquarter->physical_address)
            <p class="my-1 mb-3">{!! $headquarter->physical_address !!}</p>
          @endif
          @if ($headquarter->email)
          <p class="my-1"><span class="text-faded fa fa-envelope mr-2"></span> 
            <a href="mailto:{{ $headquarter->email }}">{{ $headquarter->email }}</a>
          </p>
          @endif
          @if ($headquarter->toll_free)
            <p class="my-1">
              <i class="fa fa-phone mr-2"></i>
              <a href="tel:{{ $headquarter->toll_free }}">{{ $headquarter->toll_free }}</a>
            </p>
          @endif
          @if ($headquarter->phone)
            <p class="my-1">
              <i class="fa fa-mobile-alt mr-2"></i>
              <a href="tel:{{ $headquarter->phone }}">{{ $headquarter->phone }}</a>
            </p>
          @endif
          @if ($headquarter->fax)
            <p class="my-1">
              <i class="fa fa-fax mr-2"></i>
              <a href="fax:{{ $headquarter->fax }}">{{ $headquarter->fax }}</a>
            </p>
          @endif
        @endif
      </div>
         
      <div class="col-lg-8 px-0 px-xs-2 pl-lg-4 m-0 has-shifting-underline">
        <h6 class="footer-heading text-white text-right position-relative d-inline-block pb-2 mb-4 text-uppercase">
          {{label('lbl_partners')}}
          <div class="d-flex w-100  position-absolute bottom-left">
            <div class="shifting-underline-1 padding-1 bg-secondary"></div>
            <div class="shifting-underline-2 padding-1 bg-primary"></div>
          </div>
        </h6>  
        <div class=" pb-0 mb-0">
            <div class="owl-carousel has-show-on-hover owl-theme bg-none owl-loaded parallax-banner position-relative"
            style="background:url('images/bg/bg0.jpg'); background-size:cover; background-repeat: no-repeat;" data-offset="600px" data-rate="0.15">
              {{-- <div class="bg-white h-100 w-100 position-absolute top-left faded"></div> --}}
              <div class="owl-stage-outer " >
                <div class="owl-stage " style="display:flex">
                  @foreach($partners as $key => $partner)
                    <div class="owl-item text-center p-2 has-hover-bounce last-no-border-element text-center position-relative" >
                      <a target="_blank" rel="noopener noreferrer"  href="{{$partner->url}}" class="d-block max-width-260 p-3 ml-lg-0 bg-gradient-primary-secondary-transparent">
                        <div class="bg-white p-2"> <img class="pr-1 py-2 max-width-120" style="" src="{{asset('uploads/partners/'.$partner->photo_url)}}"></div>
                        <div class="mt-3" > {{ $partner->title}} </div>
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

    <div class="col-12 p-0 container d-block d-lg-none mb-2">
      @if (count($social_links) > 0)
        <h4 class="footer-media text-center pt-4 pb-0 mb-0">
          @forelse($social_links as $social_link)
              @if($social_link->title_en == 'facebook')
                <a href="{{ $social_link->url }}" target="_blank" rel="noopener noreferrer"><i class="fab icon fa-facebook-f px-2" aria-hidden="true"></i></a>
              @endif
              @if($social_link->title_en == 'twitter')
                <a href="{{ $social_link->url }}" target="_blank" rel="noopener noreferrer"><i class="fab icon fa-twitter  px-2" aria-hidden="true"></i></a>
              @endif
              @if($social_link->title_en == 'youtube')
                <a href="{{ $social_link->url }}" target="_blank" rel="noopener noreferrer"><i class="fab icon fa-youtube  px-2" aria-hidden="true"></i></a>
              @endif
              @if($social_link->title_en == 'linkedIn')
                <a href="{{ $social_link->url }}" target="_blank" rel="noopener noreferrer"><i class="fab icon fa-linkedin-in  px-2" aria-hidden="true"></i></a>
              @endif
              @if($social_link->title_en == 'blog')
                <a href="{{ $social_link->url }}" target="_blank" rel="noopener noreferrer"><i class="fab icon fa-blogger-b  px-2" aria-hidden="true"></i></a>
              @endif
              @if($social_link->title_en == 'whatsapp')
                <a href="{{ $social_link->url }}" target="_blank" rel="noopener noreferrer"><i class="fab icon fa-whatsapp  px-2" aria-hidden="true"></i></a>
              @endif
              @if($social_link->title_en == 'vimeo')
                <a hrf="{{ $social_link->url }}" target="_blank" rel="noopener noreferrer"><i class="fab icon fa-vimeo  px-2" aria-hidden="true"></i></a>
              @endif
              @if($social_link->title_en == 'skype')
                <a href="{{ $social_link->url }}" target="_blank" rel="noopener noreferrer"><i class="fab icon fa-skype  px-2" aria-hidden="true"></i></a>
              @endif
              @if($social_link->title_en == 'tumblr')
                <a href="{{ $social_link->url }}" target="_blank" rel="noopener noreferrer"><i class="fab icon fa-tumblr  px-2" aria-hidden="true"></i></a>
              @endif
              @if($social_link->title_en == 'snapchat')
                <a href="{{ $social_link->url }}" target="_blank" rel="noopener noreferrer"><i class="fab icon fa-snapchat  px-2" aria-hidden="true"></i></a>
              @endif
              @if($social_link->title_en == 'flickr')
                <a href="{{ $social_link->url }}" target="_blank" rel="noopener noreferrer"><i class="fab icon fa-flickr  px-2" aria-hidden="true"></i></a>
              @endif
              @if($social_link->title_en == 'instagram')
                <a href="{{ $social_link->url }}" target="_blank" rel="noopener noreferrer"><i class="fab icon fa-instagram  px-2" aria-hidden="true"></i></a>
              @endif
            @endforeach
        </h4>
      @endif
    </div>
  </div>



  <div class="site-info bg-primary border-top-secondary position-relative z-index-2"> 
    <span class="scroll-to-top has-hover-bounce bg-none border-0 text-white cursor-pointer  " style="transform:translateY(0px)">
      <div class="p-2 round d-flex justify-content-center position-relative align-items-center box-60">
        <div class="round border-width-3 border border-color-secondary d-flex position-absolute 
            justify-content-center align-items-center m-auto  borderrr  box-70"  >
        </div>
        <div class="bg-white round d-flex position-absolute justify-content-center align-items-center m-auto box-60"  >
        </div>
        <span class="d-inline-block box-40 position-relative z-index-2" style="transform: scaleY(-1); top:-10px">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90.55 50.67" class="hover-bounce" ><polygon class="stroke-secondary" points="45.27 17.54 1.97 1.97 45.27 48.69 88.58 1.97 45.27 17.54"/></svg>
        </span>
      </div> 
    </span>

    <div class="col-md-12 pl-0 list no-padding-sm text-center  footer-links footer-nav p-3">
      <ul class="list-inline mb-0">
        {!! App\Models\MenuItem::getMenu('footer_menu') !!}
      </ul>
    </div>
    <div class="copyright text-white-50 p-3 footer-nav">
        <div class="text-white-50 text-center">
          © {{ date('Y') }} {{ label('lbl_site_title_short')}}, {{ label('lbl_copyright')}}
        </div>
    </div>
  </div>
</footer>

