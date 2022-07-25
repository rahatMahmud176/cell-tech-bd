<section class="featured-categories section">
    <div class="container">
    <div class="row">
    <div class="col-12">
    <div class="section-title">
    <h2>Featured Categories</h2>
    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
    suffered alteration in some form.</p>
    </div>
    </div>
    </div>
    <div class="row">

@foreach ($categories as $item) 
    <div class="col-lg-4 col-md-6 col-12">
    
    <div class="single-category">
    <h3 class="heading"> {{ $item->title }}</h3>
    <ul>
     @foreach ($item->category_brand as $subCat)
         <li><a href="product-grids.html">{{ $subCat->title }}</a></li>
     @endforeach
    
     
    </ul>
    <div class="images">
    <img src="{{ $item->image }}" alt="#">
    </div>
    </div>
    
    </div>
@endforeach   
     
     
    
    
    </div>
    </div>
    </section>