<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BrandController extends Controller
{
    public $brand ;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back-end.brand.manage',[
            'brands'    => Brand::orderBy('id','desc')->get(),
            'categories'=> Category::where('status',1)->orderBy('id','desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Brand::newBrand($request);
        Alert::success('Save','Brand Save Successfully');
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
        return view('back-end.brand.edit',[
            'brand'       => Brand::find($id),
            'categories'  => Category::where('status',1)->orderBy('id','desc')->get(),
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
        Brand::updateBrand($request,$id);
        Alert::success('updated','Brand Updated Successfully');
        return redirect('brand');
    }


    public function brandDeleteAlert($id)
    {
        alert()->question('Are you sure?','You won\'t be able to revert this!')
        ->showConfirmButton('<a href="brand-delete/'.$id.'" style="color:white">Delete</a>', '#f22e02')->toHtml()
        ->showCancelButton('Cancel', '#aaa')->reverseButtons();
        return redirect()->back();
    }
    public function brandDelete($id)
    {

       


    DB::beginTransaction();
    $this->brand = Brand::find($id);
    if ($this->brand->image != 'no-image') {
        unlink($this->brand->image);
    } 
        $this->brand->delete();
        Alert::error('Dleted','Deleted This brand!');
        return redirect()->back();
        
    try {
    
    } catch (\Exception $e) {
        DB::rollback();
        Alert::error('Error','Something is error!');
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
