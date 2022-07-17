@extends('site.inner')

@section('title')
{!! label('lbl_publications') !!}
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">{{ label('lbl_publications') }}</li>
@endsection

@section('page_title')
{!! label('lbl_publications') !!}
@endsection

@section('page_content')
<div class="bg-gradient-white-light h-100 w-100 position-absolute top-left"></div>
<div class="about-page main-container container-fluid bg-white">
	<div class="col-12">
	
		<div class="row">
			<div class="col-lg-12 px-0 my-2 page-content">

 
				<div class="row mx-0 has-shifting-underline">
          <div class="col-12 py-1 px-0">
            <h5 class="pb-2 position-relative page-title text-uppercase text-primary hover-text-primary"> 
              <span class="d-inline-block py-2 position-relative text-bold text-primary">
                <span class="px-2222">{{ label('lbl_publications') }}<</span>
              </span>
              <div class="d-flex w-100 position-absolute bottom-left">
              <div class="shifting-underline-1 padding-1 bg-secondary"></div>
              <div class="shifting-underline-2 padding-1 bg-primary"></div>
              </div>
            </h5>
          </div>

					@if (count($categories))
            <div class="col-12 px-0">
              <div class="row mx-0 mt-3">
                @foreach ($categories as $category)
                  <div class="col-lg-6 col-12 py-2"> 
                    <a href="{{ url('publications/'.$category->slug) }}" class="d-flex py-3 px-2 border w-100 h-100 align-items-center pointer-hover">
                        <i class="fa fa-chevron-right text-muted align-self-center fs-2rem"></i>
                        <i class="fa fa-folder-open c-folder align-self-center fs-2rem"></i>
                        <span class="d-inline-block pl-4 text-muted">
                          <div class="font-14 bold-600">{{label('lbl_publications')}}: {{ $category->documents_count }}</div>
                          <div class="heading-text text-primary bold-600"> {!! $category->title !!} </div>                        
                        </span>   
                      </a>    
                    </div>
                @endforeach
              </div>
            </div>

            <div class="col-12 pt-5 pb-3 d-flex justify-content-center">
              {!! $categories->render() !!}
            </div>

          @else
            <div class="col-12 bold-600">
              {{label('lbl_no_information')}}
            </div>
          @endif
											
				</div>
  
			</div>
		</div>
		
	</div>
</div>

@stop

