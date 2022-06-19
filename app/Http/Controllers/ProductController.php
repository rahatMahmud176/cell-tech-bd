<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImages;
use App\Models\ProductSize;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public $productImage;
    public $product;



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back-end.product.add',[
                'categories'     => Category::where('status',1)->orderBy('id','desc')->get(),
                'colors'         => Color::orderBy('id','desc')->get(),
                'sizes'          => Size::orderBy('id','desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.product.manage',[
            'products'      => Product::orderBy('id','desc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getBrandByCategory()
    {
         return response()->json(Brand::where('category_id',$_GET['id'])->get(['id','title']));
    }
    public function store(Request $request)
    { 


        DB::beginTransaction(); 
        try {
            
         
        $this->product_id =  Product::newProduct($request);
        $i =0;
        foreach ($request->file('other_image') as $image) {
            ProductImages::newProductImage($this->product_id,$request->title.$i++,$image);
        }
        foreach ($request->colors as $color) {
            ProductColor::newProductColor($this->product_id,$color);
        } 
        foreach ($request->sizes as $size) {
            ProductSize::newProductSize($this->product_id,$size);
        }
 
            DB::commit();
            // all good
            Alert::success('Save','Product Save Successfully');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Alert::error('Error','something went wrong');
            return redirect()->back();
        }
    }
    public function statusChange($id)
    {
        $this->product = Product::find($id);
        if ($this->product->status==1) {
            $this->product->status = 0;
        } else {
            $this->product->status = 1;
        }
        $this->product->save();
        Alert::success('Success','Product Status Changed!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('back-end.product.edit',[
            'product'        => Product::find($id),
            'categories'     => Category::where('status',1)->orderBy('id','desc')->get(),
            'colors'         => Color::orderBy('id','desc')->get(),
            'sizes'          => Size::orderBy('id','desc')->get(),
            'brands'         => Brand::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction(); 
        try {
            //
            ProductColor::where('product_id',$id)->delete();
            ProductSize::where('product_id',$id)->delete();
            if ($request->file('image')) {
                $this->product = Product::find($id);
                unlink($this->product->image);
            } 
        $this->product_id =  Product::UpdateProduct($request,$id);
        $i =0;
        if ($request->file('other_image')) {
            $this->productImage = ProductImages::where('product_id',$id)->get();
            foreach ($this->productImage as $img) {
                unlink($img->image);
                $img->delete();
        } 
            foreach ($request->file('other_image') as $image) {
                ProductImages::newProductImage($this->product_id,$request->title.$i++,$image);
            }
        }
        
        foreach ($request->colors as $color) {
            ProductColor::newProductColor($this->product_id,$color);
        } 
        foreach ($request->sizes as $size) {
            ProductSize::newProductSize($this->product_id,$size);
        }
 
            DB::commit();
            // all good
            Alert::success('Updated','Product Update Successfully');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Alert::error('Error','something went wrong');
            return redirect()->back();
        }
    }



    public function productDeleteAlert($id)
    {
        alert()->question('Are you sure?','You won\'t be able to revert this!')
        ->showConfirmButton('<a href="product-delete/'.$id.'" style="color:white">Delete</a>', '#f22e02')->toHtml()
        ->showCancelButton('Cancel', '#aaa')->reverseButtons();
        return redirect()->back();
    }
    
    public function productDelete($id)
    {
         
        DB::beginTransaction();

        try {
            ProductColor::where('product_id',$id)->delete();
            ProductSize::where('product_id',$id)->delete();
            $this->productImage = ProductImages::where('product_id',$id)->get();
            foreach ($this->productImage as $img) {
                unlink($img->image);
                $img->delete();
            }  
            $this->product = Product::find($id);
            unlink($this->product->image);
            $this->product->delete();

            DB::commit();
            // all good
            Alert::success('Save','Product Delete Successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Alert::error('Error','something went wrong');
            return redirect()->back();
        }
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
