@extends('font-end.master')
@section('title')
    Home
@endsection
@section('main-content')
@include('font-end.home.hero-area')
    
    
    @include('font-end.home.featured-category')
    
    
    @include('font-end.home.trending-product')
    
    
    @include('font-end.home.banner')
    
    
    @include('font-end.home.special-offer')
    
    
    @include('font-end.home.product-list')
    
    
    @include('font-end.home.delevary-agent')
    
    
    @include('font-end.home.blog')
    
    
   @include('font-end.home.shipping-info')
@endsection