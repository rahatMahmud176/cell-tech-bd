<?php

namespace App\Http\Controllers;

use App\Models\DelevaryAgent;
use App\Models\Slider;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DelevaryAgentController extends Controller
{

    public $AgentCount;
    public $agent;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back-end.delevary-agent.manage',[
            'delevaryAgents'    => DelevaryAgent::all(),
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
        $this->AgentCount = DelevaryAgent::all()->count();
        if ($this->AgentCount >= 12) {
             toast('Maximum 12 Agent','error');
        } else {
        DelevaryAgent::newDelevaryAgent($request);
        Alert::success('Save','New Delevary Agent Save Successfully');
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
    public function delevaryAgentDeleteAlert($id)
    {
        alert()->question('Are you sure?','You won\'t be able to revert this!')
        ->showConfirmButton('<a href="delevary-agent-delete/'.$id.'" style="color:white">Delete</a>', '#f22e02')->toHtml()
        ->showCancelButton('Cancel', '#aaa')->reverseButtons();
        return redirect()->back();
    }
    public function delevaryAgentDelete($id)
    {

        $this->agent = DelevaryAgent::find($id);
        unlink($this->agent->image);
        $this->agent->delete();
        Alert::error('Dleted','Deleted Delevary Agent!');
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
