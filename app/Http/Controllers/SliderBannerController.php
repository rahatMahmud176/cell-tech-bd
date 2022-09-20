<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\SliderBanner;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SliderBannerController extends Controller
{

    public $banner;
    public $sliderBanner;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('back-end.slider.slider-banner',[
            'sliderBanners'    => SliderBanner::all(),
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
        $this->banner = SliderBanner::all()->count();
        if ($this->banner >= 3) {
            toast('Maximum 3 Banner','error');
        } else {
        SliderBanner::newBanner($request); 
        Alert::success('Save','New banner save success');
        }
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
        $this->banner = SliderBanner::where('status',1)->get();
        foreach ($this->banner as $value) {
            $value->status = 0;
            $value->save();
        }
        

        $this->banner = SliderBanner::find($id);
        $this->banner->status   = 1;
        $this->banner->save();

        Alert::success('Done','Slider Banner Activate Success!');
        return redirect()->back();
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

    public function sliderBannerDeleteAlert($id)
    {
        alert()->question('Are you sure?','You won\'t be able to revert this!')
        ->showConfirmButton('<a href="slider-banner-delete/'.$id.'" style="color:white">Delete</a>', '#f22e02')->toHtml()
        ->showCancelButton('Cancel', '#aaa')->reverseButtons();
        return redirect()->back();
    }
    public function sliderBannerDelete($id)
    {
        $this->sliderBanner = SliderBanner::find($id);
        unlink($this->sliderBanner->image);
        $this->sliderBanner->delete();
         Alert::error('Dleted','Deleted slider banner!');
         return redirect()->back();
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
