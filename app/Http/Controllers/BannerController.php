<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BannerController extends Controller
{
    public $banner;
    public $count;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back-end.home-page-content.banner',[
            'banners'   => Banner::orderBy('id','desc')->get()
        ]);
    }
public function BannerStatusChange($id)
{
    $this->count  = Banner::where('status',1)->count();
    $this->banner = Banner::find($id);
    if ($this->count>=2 && $this->banner->status==0) {
        Alert::error('Warnign','Maximum Active 2 Banners');
        return redirect()->back();
    }else{ 
        if ($this->banner->status==1) {
            $this->banner->status = 0;
        } else {
            $this->banner->status = 1;
        }
        $this->banner->save();
        Alert::success('Success','Banner Status Changed!');
        return redirect()->back();
    }
    

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
        Banner::newBanner($request);
        Alert::success('save','Banner Save successfully');
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
        //
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
        //
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
