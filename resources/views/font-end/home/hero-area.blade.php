<section class="hero-area">
    <div class="container">
    <div class="row">
    <div class="col-lg-8 col-12 custom-padding-right">
    <div class="slider-head">
    
    <div class="hero-slider">

   @foreach ($sliders as $item)
       
      
    
    <div class="single-slider" style="background-image: url({{ $item->image }});">
    <div class="content">
    <h2><span>{{ $item->small_title }}</span>
        {{ $item->title }}
    </h2>
    <p>{{ $item->description }}</p>
    <h3><span>Now Only</span> ৳{{ $item->price }}</h3>
    <div class="button">
    <a href="{{ $item->button_link }}" class="btn">{{ $item->button_text }}</a>
    </div>
    </div>
    </div>
    
@endforeach  
    </div>
    
    </div>
    </div>



    <div class="col-lg-4 col-12">
    <div class="row">
       

    <div class="col-lg-12 col-md-6 col-12 md-custom-padding"> 
    <div class="hero-small-banner" style="background-image: url('{{ $sliderBanner->image }}');">
    <div class="content">
    <h2>
    <span>{{ $sliderBanner->small_title }}</span>
    {{ $sliderBanner->product_name }}
    </h2>
    <h3>$ {{ $sliderBanner->price }}</h3>
    </div>
    </div> 
    </div>


    <div class="col-lg-12 col-md-6 col-12"> 
    <div class="hero-small-banner style2">
    <div class="content">
    <h2>{{ $sliderBanner->header }}</h2>
     <p>{{ $sliderBanner->description }}</p>
    <div class="button">
    <a class="btn" href="{{ $sliderBanner->button_link }}">{{ $sliderBanner->button_text }}</a>
    </div>
    </div>
    </div> 
    </div>


    </div>
    </div>
    </div>
    </div>
    </section>