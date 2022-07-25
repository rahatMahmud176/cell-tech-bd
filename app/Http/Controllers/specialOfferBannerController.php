<?php

namespace App\Http\Controllers;

use App\Models\SpecialOfferBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class specialOfferBannerController extends Controller
{
    public $banner;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back-end.home-page-content.special-offer-banner.add',[
            'banners'       => SpecialOfferBanner::all(),
        ]);
    }

    public function spoBannerStatusChange ($id)
{
    $this->count  = SpecialOfferBanner::where('status',1)->count();
    $this->banner = SpecialOfferBanner::find($id);
    if ($this->count>=1 && $this->banner->status==0) {
        Alert::error('Warnign','Maximum Active 1 Banners');
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
        $this->count  = SpecialOfferBanner::count();
        if ($this->count>=3) {
            Alert::error('Warning','Delete One first');
            return redirect()->back();
        } else {
            SpecialOfferBanner::newSpecialOfferBanner($request);
            Alert::success('Save','Save successfully');
            return redirect()->back();
        }
        
         
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
         return view('back-end.home-page-content.special-offer-banner.edit',[
            'banner'    => SpecialOfferBanner::find($id),
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
            if ($request->file('image')) {
                unlink(SpecialOfferBanner::find($id)->image);
            }
            SpecialOfferBanner::specialofferbannerUpdate($request,$id);
            DB::commit(); 
            Alert::success('Updated','Banner Updated Successfully');
            return redirect('spoBanner');

        } catch (\Exception $e) {
            DB::rollback(); 
            Alert::error('Error','Something is wrong');
        }
         
        
    }

    public function bannerDeleteAlert($id)
    {
        alert()->question('Are you sure?','You won\'t be able to revert this!')
        ->showConfirmButton('<a href="spoBanner-delete/'.$id.'" style="color:white">Delete</a>', '#f22e02')->toHtml()
        ->showCancelButton('Cancel', '#aaa')->reverseButtons();
        return redirect()->back();
    }
    public function bannerDelete($id)
    {
        $this->banner  = SpecialOfferBanner::find($id);
        unlink($this->banner->image);
        $this->banner->delete();
        Alert::error('Deleted','This Banner Parmanently Delete!');
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
