<section class="special-offer section">
    <div class="container">
    <div class="row">
    <div class="col-12">
    <div class="section-title">
    <h2>Special Offer</h2>
    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
    suffered alteration in some form.</p>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-8 col-md-12 col-12">
    <div class="row">



    <div class="col-lg-4 col-md-4 col-12"> 
    <div class="single-product">
    <div class="product-image">
    <img src="{{ asset('/') }}font-end/assets/images/products/product-3.jpg" alt="#">
    <div class="button">
    <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
    Cart</a>
    </div>
    </div>
    <div class="product-info">
    <span class="category">Camera</span>
    <h4 class="title">
    <a href="product-grids.html">WiFi Security Camera</a>
    </h4>
    <ul class="review">
    <li><i class="lni lni-star-filled"></i></li>
    <li><i class="lni lni-star-filled"></i></li>
    <li><i class="lni lni-star-filled"></i></li>
    <li><i class="lni lni-star-filled"></i></li>
    <li><i class="lni lni-star-filled"></i></li>
    <li><span>5.0 Review(s)</span></li>
    </ul>
    <div class="price">
    <span>$399.00</span>
    </div>
    </div>
    </div> 
    </div>
 

    

    </div>



@foreach ($spoBanners as $spoBanner)
    

    
    <div class="single-banner right row" style="background-image:url({{ $spoBanner->image }});margin-top: 30px;">
        <div class="col-md-4" >
        </div>
        <div class="content col-md-8" >
    <h2>{{ $spoBanner->header }} </h2>
    <p>{{ $spoBanner->description }}</p>
    <div class="price float-right">
    <span>৳: {{ $spoBanner->price }}\-</span>
    </div>
    <div class="button float-right">
    <a href="{{ $spoBanner->button_link }}" class="btn">{{ $spoBanner->button_text }}</a>
    </div>
    </div>
    </div>
    @endforeach
    
    </div>


@foreach ($sponeBanners as $item) 
    <div class="col-lg-4 col-md-12 col-12">
    <div class="offer-content">
    <div class="image">
    <img src="{{ asset($item->image) }}" alt="#">
    <span class="sale-tag">-{{$item->discount_percentage}}%</span>
    </div>
    <div class="text">
    <h2><a href="product-grids.html">{{ $item->title }}</a></h2>
    <ul class="review">
    <li><i class="lni lni-star-filled"></i></li>
    <li><i class="lni lni-star-filled"></i></li>
    <li><i class="lni lni-star-filled"></i></li>
    <li><i class="lni lni-star-filled"></i></li>
    <li><i class="lni lni-star-filled"></i></li>
    <li><span>5.0 Review(s)</span></li>
    </ul>
    <div class="price">
    <span>৳:{{ $item->price }}/-</span> 
    <span class="discount-price">৳:{{ $item->cut_price }}/-</span> 
    </div>
    <p>{{$item->description}}</p>
    </div>
    <div class="box-head" style="height: 55px;">
        {{-- <div class="box">
        <h1 id="days">000</h1>
        <h2 id="daystxt">Days</h2>
        </div>
        <div class="box">
        <h1 id="hours">00</h1>
        <h2 id="hourstxt">Hours</h2>
        </div>
        <div class="box">
        <h1 id="minutes">00</h1>
        <h2 id="minutestxt">Minutes</h2>
        </div>
        <div class="box">
        <h1 id="seconds">00</h1>
        <h2 id="secondstxt">Secondes</h2>
        </div> --}}
    </div>
    <div style="background: rgb(204, 24, 24);" class="alert">
    <h1 style="padding: 50px 80px;color: white;">We are sorry, Event ended ! </h1>
    </div>
    </div>
    </div>
@endforeach


    </div>
    </div>
    </section>