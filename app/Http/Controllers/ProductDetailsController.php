<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public $product;

    public function ProductDetails($id)
    {
        $this->product = Product::find($id);
        $this->product->hit_count = $this->product->hit_count + 1;
        $this->product->save();
        return view('font-end.product.product-details',[
            'product'   => $this->product,
            'image'     => ProductImages::where('product_id',$id)->first()
         ]);
    }



}//c
