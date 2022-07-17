<div class="social-media-side d-none d-lg-block">
   @foreach($social_links as $key => $social_link )
    <a target="_blank" rel="noopener noreferrer" href="{{ $social_link->url }}"
        class="social-media-box d-flex align-items-center justify-content-end">
      <div class="h-40 d-flex align-items-center social-text bg-primary text-white">{{ $social_link->title_en }}</div>
      <div class="box-40 d-flex box-shadow-slight cursor-pointer justify-content-center
       bg-white border text-primary align-items-center">
        <i class="fab fa-{{$social_link->title_en}}"></i>
      </div>
    </a>
    @endforeach
</div>

 
 