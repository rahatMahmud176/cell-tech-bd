<?php
 
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['middleware' => 'guest'], function()
{

Route::get('/login',[
    'uses'     =>'App\Http\Controllers\DashbordController@login',
    'as'       => 'login'
]);
 

Route::get('/register',[
    'uses'     =>'App\Http\Controllers\DashbordController@register',
    'as'       => 'register'
]);
 





});//





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[
        'uses'  => 'App\Http\Controllers\DashbordController@dashboard',
        'as'    => 'dashboard'
    ]);

Route::resource('slider', App\Http\Controllers\SliderController::class); 
Route::get('slider.deleteAlert/{id}',[
    'uses'  => 'App\Http\Controllers\SliderController@sliderDeleteAlert',
    'as'    => 'slider.deleteAlert'
]);
Route::get('slider-delete/{id}',[
    'uses'  => 'App\Http\Controllers\SliderController@sliderDelete',
    'as'    => 'slider-delete/'
]);


Route::resource('slider-banner', App\Http\Controllers\SliderBannerController::class); 
Route::get('slider-banner.delete-alert/{id}',[
    'uses'  => 'App\Http\Controllers\SliderBannerController@sliderBannerDeleteAlert',
    'as'    => 'slider-banner.delete-alert'
]);
Route::get('slider-banner-delete/{id}',[
    'uses'  => 'App\Http\Controllers\SliderBannerController@sliderBannerDelete',
    'as'    => 'slider-banner-delete'
]);
 
Route::resource('delevary-agent', App\Http\Controllers\DelevaryAgentController::class); 
Route::get('delevary-agent.deleteAlert/{id}',[
    'uses'  => 'App\Http\Controllers\DelevaryAgentController@delevaryAgentDeleteAlert',
    'as'    => 'delevary-agent.deleteAlert'
]);
Route::get('delevary-agent-delete/{id}',[
    'uses'  => 'App\Http\Controllers\DelevaryAgentController@delevaryAgentDelete',
    'as'    => 'delevary-agent-delete'
]);

Route::resource('category', App\Http\Controllers\CategoryController::class);  
Route::get('category.deleteAlert/{id}',[
    'uses'  => 'App\Http\Controllers\CategoryController@categoryDeleteAlert',
    'as'    => 'category.deleteAlert'
]);
Route::get('category-delete/{id}',[
    'uses'  => 'App\Http\Controllers\CategoryController@categoryDelete',
    'as'    => 'category-delete'
]);

Route::resource('brand', App\Http\Controllers\BrandController::class); 
Route::get('brand.deleteAlert/{id}',[
    'uses'  => 'App\Http\Controllers\BrandController@brandDeleteAlert',
    'as'    => 'brand.deleteAlert'
]);
Route::get('brand-delete/{id}',[
    'uses'  => 'App\Http\Controllers\BrandController@brandDelete',
    'as'    => 'brand-delete'
]);

Route::resource('color', App\Http\Controllers\ColorController::class); 
Route::get('color.deleteAlert/{id}',[
    'uses'  => 'App\Http\Controllers\ColorController@colorDeleteAlert',
    'as'    => 'color.deleteAlert'
]);
Route::get('color-delete/{id}',[
    'uses'  => 'App\Http\Controllers\ColorController@colorDelete',
    'as'    => 'color-delete'
]); 

Route::resource('size', App\Http\Controllers\SizeController::class); 
Route::get('size.deleteAlert/{id}',[
    'uses'  => 'App\Http\Controllers\SizeController@sizeDeleteAlert',
    'as'    => 'size.deleteAlert'
]);
Route::get('size-delete/{id}',[
    'uses'  => 'App\Http\Controllers\SizeController@sizeDelete',
    'as'    => 'size-delete'
]);

Route::resource('product', App\Http\Controllers\ProductController::class); 

Route::get('get-brand-by-category',[
    'uses'  => 'App\Http\Controllers\ProductController@getBrandByCategory',
    'as'    => 'get-brand-by-category'
]);

Route::get('product.deleteAlert/{id}',[
    'uses'  => 'App\Http\Controllers\ProductController@productDeleteAlert',
    'as'    => 'product.deleteAlert'
]);
Route::get('product/product-delete/{id}',[
    'uses'  => 'App\Http\Controllers\ProductController@productDelete',
    'as'    => 'product-delete'
]); 
Route::get('status-change/{id}',[
    'uses'  => 'App\Http\Controllers\ProductController@statusChange',
    'as'    => 'status-change'
]);



Route::resource('banner', App\Http\Controllers\BannerController::class); 
Route::get('banner-status-change/{id}',[
    'uses'  => 'App\Http\Controllers\BannerController@BannerStatusChange',
    'as'    => 'banner-status-change'
]);







});


// =======================FontEnd Routes============================

Route::get('/',[
    'uses'     =>'App\Http\Controllers\HomeController@index',
    'as'       => '/'
]);


Route::get('/image', function() {
    
    $img = Image::make('foo.jpg')->resize(300, 200);
    return $img->response('jpg');
});