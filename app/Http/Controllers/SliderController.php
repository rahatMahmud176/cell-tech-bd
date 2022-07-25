<?php

namespace App\Http\Controllers;

 

use App\Models\Slider;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SliderController extends Controller
{

    public $slider;
    public $sliderCount = 0;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back-end.slider.add-slider',[
            'sliders'   => Slider::orderBy('id','desc')->get(),
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
        $this->sliderCount = Slider::all()->count();
       if ($this->sliderCount >= 3) {
         toast('Maximum 3 Slider','error');
       }else{
        Slider::newSlider($request);
        Alert::success('Done','New Slider Create Done.');
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
         return view('back-end.slider.edit-slider',[
             'slider'   => Slider::find($id), 
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
        Slider::updatSlider($request,$id);

        Alert::success('Updated','Slider Update successfull');
        return redirect('/slider');
    }

    public function sliderDeleteAlert($id)
    {
        // example:
            alert()->question('Are you sure?','You won\'t be able to revert this!')
            ->showConfirmButton('<a href="slider-delete/'.$id.'" style="color:white">Delete</a>', '#f22e02')->toHtml()
            ->showCancelButton('Cancel', '#aaa')->reverseButtons();
            return redirect()->back();
    }

    public function sliderDelete($id)
    {

        $this->slider = Slider::find($id);
        unlink($this->slider->image);
        $this->slider->delete();
        Alert::error('Deleted','Your Slider Is Deleted !');
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
