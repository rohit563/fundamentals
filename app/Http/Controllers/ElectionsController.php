<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use DB;
use App\Election;
use App\Candidate;

class ElectionsController extends Controller
{
    protected function create(array $data)
    {
        return view('election.show');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'Name' =>           'Required',
            'Election_info'=>   'Required',
            'Date' =>           'Required|Date',
            'Election_Type' =>  'Required'
        ]);
        
        // // Candidate Creation
        
        $this->validate($request->all(), [
            'Candidate_Name' => 'Required',
            'Age'=>             'Required',
            'Political_Party' => 'Required',
            'Candidate_Info' => 'Required',
        ]);
        
        Candidate::create($request->all());
        Election::create($request->only(['Name', 'Election_info','Date','Election_Type']));
        
        return redirect()->back()->with('message','Election and Candidates created successfully');
    }
    
    public function register(Request $request)
    {
        $input = $request->all();
        $election = $this->create($request->all());
        return back()->with('message','Election Updated Successfully.');
    }
    public function index()
    {
        return view('election.create');
    }
    public function show($id)
    {
        $election = Election::find($id);
        return view('election.show',compact('election'));
        // return $id;
    }
}
