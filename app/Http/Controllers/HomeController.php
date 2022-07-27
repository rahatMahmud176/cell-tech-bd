<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\DelevaryAgent;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SliderBanner;
use App\Models\SpecialOfferBanner;
use App\Models\SponeBanner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
   {
        return view('font-end.home.home',[
           'sliders'                => Slider::all(),
           'sliderBanners'           => SliderBanner::where('status',1)->get(),
           'delevaryAgents'         => DelevaryAgent::all(),
           'categories'             => Category::where('status',1)->take(6)->get(),
           'trandingProducts'       => Product::where('status',1)->orderBy('hit_count','desc')->get()->take('8'),
           'banners'                => Banner::where('status',1)->get(),
           'spoBanners'             => SpecialOfferBanner::where('status',1)->get(),
           'sponeBanners'           => SponeBanner::where('status',1)->get(),
        ]);
   }
}//
