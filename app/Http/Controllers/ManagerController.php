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
    public function index()
    {
        $elections = Election::all();
        $candidates = Candidate::all();
        $count = $elections->count();
        $ccount = $candidates->count();
        $date = Carbon::now();
        //printf("Now: %s", Carbon::now());
        return view('manager',compact('elections','count','candidates','ccount','date'));
        // return view('manager');
    }
    
}
