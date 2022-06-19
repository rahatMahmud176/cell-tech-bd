<div class="brands">
    <div class="container">
    <div class="row">
    <div class="col-lg-6 offset-lg-3 col-md-12 col-12">
    <h2 class="title">Our Delevary Agent</h2>
    </div>
    </div>
    <div class="brands-logo-wrapper">
    <div class="brands-logo-carousel d-flex align-items-center justify-content-between">
        
@foreach ($delevaryAgents as $item) 
    <div class="brand-logo">
    <img src="{{ $item->image }}" alt="#">
    </div>
@endforeach
 
    </div>
    </div>
    </div>
    </div>