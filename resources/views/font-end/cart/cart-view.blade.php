@extends('font-end.master')

@section('title')
    My Cart
@endsection
@section('main-content')


@include('font-end.includes.breadcrumbs')
    
    
    <div class="shopping-cart section">
    <div class="container">
    <div class="cart-list-head">
    
    <div class="cart-list-title">
    <div class="row">
    <div class="col-lg-1 col-md-1 col-12">
    </div>
    <div class="col-lg-4 col-md-3 col-12">
    <p>Product Name</p>
    </div>
    <div class="col-lg-2 col-md-2 col-12">
    <p>Quantity</p>
    </div>
    <div class="col-lg-2 col-md-2 col-12">
    <p>Price</p>
    </div>
    <div class="col-lg-2 col-md-2 col-12">
    <p>Subtotal</p>
    </div>
    <div class="col-lg-1 col-md-2 col-12">
    <p>Remove</p>
    </div>
    </div>
    </div>
    @php
        $i = 1;
    @endphp
    
@foreach ($products as $item)
    

    <div class="cart-single-list">
    <div class="row align-items-center">
    <div class="col-lg-1 col-md-1 col-12">
    <a href="product-details.html"><img src="{{ asset($item->attributes->image) }}" alt="#"></a>
    </div>
    <div class="col-lg-4 col-md-3 col-12">
    <h5 class="product-name"><a href="product-details.html">
    {{ $item->name }}</a></h5>
    <p class="product-des">
    <span><em>Variant:</em> {{ App\Models\Size::find($item->attributes->size_id)->title }}</span>
    <span><em>Color:</em> {{ App\Models\Color::find($item->attributes->color_id)->title }}</span>
    </p>
    </div>
    <div class="col-lg-2 col-md-2 col-12">
    <div class="count-input">
    <select class="form-control productQty" data-id="{{ $item->id }}">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option selected value="{{ $item->quantity }}">{{ $item->quantity }}</option>
    </select> 
    </div> 
    </div>
    <div class="col-lg-2 col-md-2 col-12">
    <p>{{ $item->price }}\-</p>
    </div>
    <div class="col-lg-2 col-md-2 col-12">
    <p>{{ $item->price*$item->quantity }}\-</p>
    </div>
    <div class="col-lg-1 col-md-2 col-12">
    <a class="remove-item" href="{{ route('remove-cart-product',['id'=>$item->id]) }}"><i class="lni lni-close"></i></a>
    </div>
    </div>
    </div>
    
    @php
         $i++ 
    @endphp
@endforeach    
    
     
    
    
     
    
    </div>
    <div class="row">
    <div class="col-12">
    
    <div class="total-amount">
    <div class="row">
    <div class="col-lg-8 col-md-6 col-12">
    <div class="left">
    <div class="coupon">
     <form action="#" target="_blank">
    <input name="Coupon" placeholder="Enter Your Coupon">
    <div class="button">
    <button class="btn">Apply Coupon</button>
    </div>
    </form>
    </div>
    </div>
    </div>
    <div class="col-lg-4 col-md-6 col-12">
    <div class="right">
    <ul>
    <li>Cart Subtotal<span>{{ Cart::getSubTotal() }}\-</span></li>
    <li>Shipping<span>Free</span></li>
    <li>VAT:5%<span> {{ $vat = Cart::getSubTotal()*0.05 }}\-</span></li>
    <li class="last">You Pay<span>{{ Cart::getSubTotal()+$vat }}\-</span></li>
    </ul>
    <div class="button">
    <a href="{{ route('customer-login') }}" class="btn">Checkout</a>
    <a href="{{ route('/') }}" class="btn btn-alt">Continue shopping</a>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    </div>
    </div>
    </div>
    </div> 
    
@endsection