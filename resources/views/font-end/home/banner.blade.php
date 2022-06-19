<section class="banner section">
    <div class="container">
    <div class="row">
@foreach ($banners as $item)

    <div class="col-lg-6 col-md-6 col-12">
    <div class="single-banner" style="background-image:url('{{ asset($item->image) }}')">
    <div class="content">
    <h2>{{ $item->header }}</h2>
    <p>{{ $item->description }}<br>Black/Volt Real Sport Band </p>
    <div class="button">
    <a href="{{ $item->button_link }}" class="btn">{{ $item->button_text }}</a>
    </div>
    </div>
    </div>
    </div>
    
@endforeach
     
    </div>
    </div>
    </section>