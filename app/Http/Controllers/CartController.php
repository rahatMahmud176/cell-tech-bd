<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
public $product;
public $id;
public $qty;

public function addToCart(Request $request)
{
    $this->product = Product::find($request->product_id);
    \Cart::add([
    'id'         => $request->product_id,
    'name'       => $this->product->title,
    'price'      => $this->product->sell_price,
    'quantity'   => $request->qty,
    'attributes' =>[
        'image'    => $this->product->image,
        'color_id' => $request->color_id,
        'size_id'  => $request->size_id,
    ]
     ]);
     Alert::toast('Product add to cart successfuly!','success');
     return redirect('cart/cart-view');
}
public function cartView()
{
    return view('font-end.cart.cart-view',[
        'products'  => \Cart::getContent(),
    ]);
}
public function removeCartProduct($id)
{
     \Cart::remove($id);
     Alert::toast('Cart Product Remove', 'error');
     return redirect()->back();
}
public function cartQtyChange()
{
    $this->id  = $_GET['id'];
    $this->qty = $_GET['qty'];
    \Cart::update($this->id, [
        'quantity' =>[
            'relative' => false,
            'value'    => $this->qty
        ] 
        
    ]);
    Alert::toast('Cart Update Successfully','success');
    return response()->json('ok');
    
}

}//
