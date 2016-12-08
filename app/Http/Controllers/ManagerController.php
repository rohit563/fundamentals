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
    public function update(Request $request, $id) {
        $election = Election::find($id);
        if($election->isEnabled == 0){
            $election->isEnabled = 1;
            $election->save();
            return back()->with('message','Election Successfully Started');
        }
        else{
            $election->isEnabled = 0;
            $election->save();
            return back()->with('warning','Election Stopped Successfully');
        }
        
        
        // return back()->with('message','Error');
    }
    public function publish(Request $request, $id){
        $election = Election::find($id);
        if($election->publishResults ==0){
            $election->publishResults =1;
            $election->save();
            return back()->with('message','Election Published Successfully');
        }
        else{
            $election->publishResults = 0;
            $election->save();
            return back()->with('warning','Election Unpublished Successfully');
        }
    }
}
