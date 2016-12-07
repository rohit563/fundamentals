<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Election;
use App\Candidate;
use Carbon\Carbon;

class ManagerController extends Controller
{
    //
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $elections = Election::all();
        $candidates = Candidate::all();
        $count = $elections->count();
        $ccount = $candidates->count();
        $date = Carbon::now();
        
        return view('manager',compact('elections','count','candidates','ccount','date'));
    }
    public function updateTimes(Request $request){
        $elections = Election::all();
        foreach($elections as $election){
        $election->startDate = $request->input('startDate');
        $election->endDate = $request->input('endDate');
        $election->save();
        }
        return back()->with('message','Start and Stop Time Updated Successfully');
    }
    public function start(Request $request, $id) {
        $election = Election::find($id);
        $election->isEnabled = 1;
        $election->save();
        return back()->with('message','Election Successfully Started');
    }
}
