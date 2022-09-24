<?php

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Route;

//  hi bro 

Route::group(['middleware' => 'guest'], function () {

    Route::get('/login', [
        'uses'     => 'App\Http\Controllers\DashbordController@login',
        'as'       => 'login'
    ]);


    Route::get('/register', [
        'uses'     => 'App\Http\Controllers\DashbordController@register',
        'as'       => 'register'
    ]);
}); //


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [
        'uses'  => 'App\Http\Controllers\DashbordController@dashboard',
        'as'    => 'dashboard'
    ]);

    Route::resource('slider', App\Http\Controllers\SliderController::class);
    Route::get('slider.deleteAlert/{id}', [
        'uses'  => 'App\Http\Controllers\SliderController@sliderDeleteAlert',
        'as'    => 'slider.deleteAlert'
    ]);
    Route::get('slider-delete/{id}', [
        'uses'  => 'App\Http\Controllers\SliderController@sliderDelete',
        'as'    => 'slider-delete/'
    ]);


    Route::resource('slider-banner', App\Http\Controllers\SliderBannerController::class);
    Route::get('slider-banner.delete-alert/{id}', [
        'uses'  => 'App\Http\Controllers\SliderBannerController@sliderBannerDeleteAlert',
        'as'    => 'slider-banner.delete-alert'
    ]);
    Route::get('slider-banner-delete/{id}', [
        'uses'  => 'App\Http\Controllers\SliderBannerController@sliderBannerDelete',
        'as'    => 'slider-banner-delete'
    ]);

    Route::resource('delevary-agent', App\Http\Controllers\DelevaryAgentController::class);
    Route::get('delevary-agent.deleteAlert/{id}', [
        'uses'  => 'App\Http\Controllers\DelevaryAgentController@delevaryAgentDeleteAlert',
        'as'    => 'delevary-agent.deleteAlert'
    ]);
    Route::get('delevary-agent-delete/{id}', [
        'uses'  => 'App\Http\Controllers\DelevaryAgentController@delevaryAgentDelete',
        'as'    => 'delevary-agent-delete'
    ]);

    Route::resource('category', App\Http\Controllers\CategoryController::class);
    Route::get('category.deleteAlert/{id}', [
        'uses'  => 'App\Http\Controllers\CategoryController@categoryDeleteAlert',
        'as'    => 'category.deleteAlert'
    ]);
    Route::get('category-delete/{id}', [
        'uses'  => 'App\Http\Controllers\CategoryController@categoryDelete',
        'as'    => 'category-delete'
    ]);

    Route::resource('brand', App\Http\Controllers\BrandController::class);
    Route::get('brand.deleteAlert/{id}', [
        'uses'  => 'App\Http\Controllers\BrandController@brandDeleteAlert',
        'as'    => 'brand.deleteAlert'
    ]);
    Route::get('brand-delete/{id}', [
        'uses'  => 'App\Http\Controllers\BrandController@brandDelete',
        'as'    => 'brand-delete'
    ]);

    Route::resource('color', App\Http\Controllers\ColorController::class);
    Route::get('color.deleteAlert/{id}', [
        'uses'  => 'App\Http\Controllers\ColorController@colorDeleteAlert',
        'as'    => 'color.deleteAlert'
    ]);
    Route::get('color-delete/{id}', [
        'uses'  => 'App\Http\Controllers\ColorController@colorDelete',
        'as'    => 'color-delete'
    ]);

    Route::resource('size', App\Http\Controllers\SizeController::class);
    Route::get('size.deleteAlert/{id}', [
        'uses'  => 'App\Http\Controllers\SizeController@sizeDeleteAlert',
        'as'    => 'size.deleteAlert'
    ]);
    Route::get('size-delete/{id}', [
        'uses'  => 'App\Http\Controllers\SizeController@sizeDelete',
        'as'    => 'size-delete'
    ]);

    Route::resource('product', App\Http\Controllers\ProductController::class);

    Route::get('get-brand-by-category', [
        'uses'  => 'App\Http\Controllers\ProductController@getBrandByCategory',
        'as'    => 'get-brand-by-category'
    ]);

    Route::get('product.deleteAlert/{id}', [
        'uses'  => 'App\Http\Controllers\ProductController@productDeleteAlert',
        'as'    => 'product.deleteAlert'
    ]);
    Route::get('product/product-delete/{id}', [
        'uses'  => 'App\Http\Controllers\ProductController@productDelete',
        'as'    => 'product-delete'
    ]);
    Route::get('status-change/{id}', [
        'uses'  => 'App\Http\Controllers\ProductController@statusChange',
        'as'    => 'status-change'
    ]);



    Route::resource('banner', App\Http\Controllers\BannerController::class);
    Route::get('banner-status-change/{id}', [
        'uses'  => 'App\Http\Controllers\BannerController@BannerStatusChange',
        'as'    => 'banner-status-change'
    ]);
    Route::get('banner.deleteAlert/{id}', [
        'uses'  => 'App\Http\Controllers\BannerController@bannerDeleteAlert',
        'as'    => 'banner.deleteAlert'
    ]);
    Route::get('banner-delete/{id}', [
        'uses'  => 'App\Http\Controllers\BannerController@bannerDelete',
        'as'    => 'banner-delete'
    ]);



    Route::resource('spoBanner', App\Http\Controllers\specialOfferBannerController::class);
    Route::get('spoBanner-status-change/{id}', [
        'uses'  => 'App\Http\Controllers\specialOfferBannerController@spoBannerStatusChange',
        'as'    => 'spoBanner-status-change'
    ]);
    Route::get('spoBanner.deleteAlert/{id}', [
        'uses'  => 'App\Http\Controllers\specialOfferBannerController@bannerDeleteAlert',
        'as'    => 'spoBanner.deleteAlert'
    ]);
    Route::get('spoBanner-delete/{id}', [
        'uses'  => 'App\Http\Controllers\specialOfferBannerController@bannerDelete',
        'as'    => 'spoBanner-delete'
    ]);



    Route::resource('sponeBanner', App\Http\Controllers\SponeBannerController::class);
    Route::get('sponeBanner-status-change/{id}', [
        'uses'  => 'App\Http\Controllers\SponeBannerController@sponeBannerStatusChange',
        'as'    => 'sponeBanner-status-change'
    ]);
    Route::get('sponeBanner.deleteAlert/{id}', [
        'uses'  => 'App\Http\Controllers\SponeBannerController@bannerDeleteAlert',
        'as'    => 'sponeBanner.deleteAlert'
    ]);
    Route::get('sponeBanner-delete/{id}', [
        'uses'  => 'App\Http\Controllers\SponeBannerController@bannerDelete',
        'as'    => 'sponeBanner-delete'
    ]);

    // ================orders routes========================
    Route::get('all-orders', [
        'uses'  => 'App\Http\Controllers\OrderController@allOrders',
        'as'    => 'all-orders'
    ]);




});
// =======================FontEnd Routes============================

Route::get('/', [
    'uses'     => 'App\Http\Controllers\HomeController@index',
    'as'       => '/'
]);

Route::get('product-details/{id}', [
    'uses'     => 'App\Http\Controllers\ProductDetailsController@ProductDetails',
    'as'       => 'product-details'
]);
Route::post('add-to-cart', [
    'uses'     => 'App\Http\Controllers\CartController@addToCart',
    'as'       => 'add-to-cart'
]);
Route::get('product-cart-add-single/{id}', [
    'uses'     => 'App\Http\Controllers\CartController@addToCartSingle',
    'as'       => 'product-cart-add-single'
]);
Route::get('cart/cart-view', [
    'uses'     => 'App\Http\Controllers\CartController@cartView',
    'as'       => 'cart-view'
]);
Route::get('cart/remove-cart-product/{id}', [
    'uses'     => 'App\Http\Controllers\CartController@removeCartProduct',
    'as'       => 'remove-cart-product'
]);
Route::get('cart/product-qty-change', [
    'uses'     => 'App\Http\Controllers\CartController@cartQtyChange',
    'as'       => 'product-qty-change'
]);

// =================customerLogedinMiddleware=========
Route::middleware(['customerLogedinMiddleware'],)->group(function () {

    Route::get('customer/login-form', [
        'uses'     => 'App\Http\Controllers\CustomerController@loginPage',
        'as'       => 'customer-login'
    ]);
    Route::get('customer/register-form', [
        'uses'     => 'App\Http\Controllers\CustomerController@register',
        'as'       => 'customer-register',
    ]);

    Route::post('customer/new-customer', [
        'uses'     => 'App\Http\Controllers\CustomerController@newCustomer',
        'as'       => 'newCustomer'
    ]);

    Route::post('customer/customer-login', [
        'uses'     => 'App\Http\Controllers\CustomerController@customerLogin',
        'as'       => 'customerLogin'
    ]);
}); //customerLogedinMiddleware

// =============cutomerDashboardMiddleware==================

Route::middleware(['cutomerDashboardMiddleware'])->group(function () {
    Route::get('customer/customer-logout', [
        'uses'     => 'App\Http\Controllers\CustomerController@customerLogout',
        'as'       => 'customerLogout'
    ]);

    Route::get('customer-cart/checkout-page', [
        'uses'     => 'App\Http\Controllers\CustomerController@checkoutPage',
        'as'       => 'checkout-page'
    ]);
    Route::post('customer-cart/advance-payment', [
        'uses'     => 'App\Http\Controllers\CustomerController@advancePayment',
        'as'       => 'advancePayment'
    ]);
    Route::post('cart/submit-order', [
        'uses'     => 'App\Http\Controllers\OrderController@orderSubmit',
        'as'       => 'submitOrder'
    ]);
}); //cutomerDashboardMiddleware









Route::get('/image', function () {

    $img = Image::make('foo.jpg')->resize(300, 200);
    return $img->response('jpg');
});
