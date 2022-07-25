<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function ProductDetails($id)
    {
        return view('font-end.product.product-details',[
            'product'   => Product::find($id),
            'image'     => ProductImages::where('product_id',$id)->first()
         ]);
    }


public function addToCart(Request $request)
{
    return $request;
}

}//c
