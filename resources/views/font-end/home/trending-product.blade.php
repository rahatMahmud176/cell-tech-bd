<section class="trending-product section">
    <div class="container">
    <div class="row">
    <div class="col-12">
    <div class="section-title">
    <h2>Trending Product</h2>
    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
    suffered alteration in some form.</p>
    </div>
    </div>
    </div>
    <div class="row">
    
@foreach ($trandingProducts as $item) 
    <div class="col-lg-3 col-md-6 col-12"> 
    <div class="single-product">
    <div class="product-image">
    <img src="{{ $item->image }}" alt="#">
    <div class="button">
    <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
    </div>
    </div>
     <div class="product-info">
    <span class="category">{{ $item->category->title }}</span>
    <h4 class="title">
    <a href="{{ route('product-details',['id'=>$item->id]) }}">{{ $item->title }}</a>
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
    <span> ৳:{{ $item->sell_price }}/-</span>
    </div>
    </div>
    </div> 
    </div>
@endforeach
     
     
    </div>
    </div>
    </section>