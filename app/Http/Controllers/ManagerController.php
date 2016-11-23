<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Election;

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
        $count = $elections->count();
        return view('manager',compact('elections','count'));
        // return view('manager');
    }
    
}
