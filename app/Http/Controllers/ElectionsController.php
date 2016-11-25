<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use DB;
use App\Election;
use App\Candidate;

class ElectionsController extends Controller
{
    private $Election_ID;
    // protected function create()
    // {
    //     return view('election.create');
    // }
    // Request $request
    public function update(Request $request,$id)
    { 
        //Todo FIX Saving to Database Here
        // $election = Election::find($request->Election_id);
        $election = Election::find($id);
        $election->Name = $request->Name;
        $election->Election_info= $request->Election_info;
        $election->Date = $request->Date;
        $election->save();


        $candidates= Candidate::where('Election_id',$election->id)->get();
        $c = count($candidates);
        
        // for($i=0;$i<$c;$i++){
        // $candidates= Candidate::where('Election_id',$election->id)->cursor();
        foreach($candidates as $i=>$candidate)
        {
            $candidate->Candidate_Name = $request->Candidate_Name[$i];
            // $candidate->Position = $candidate->Position[$i]; Add later
            $candidate->Age = $request->Age[$i];
            // $candidate->Political_Party = $candidate->Political_Party[$i]; //Add later
            $candidate->Candidate_Info = $request->Candidate_Info[$i];
            $candidate->Election_id = $election->id;
            $candidate->save();
        }
         return back()->with('message', 'Election and Candidates Updated Successfully.');
    }
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'Name' =>           'Required',
        //     'Election_info'=>   'Required',
        //     'Date' =>           'Required|Date',
        //     'Election_Type' =>  'Required'
        // ]);
    
        $election = new Election();
        $election->Name = $request->Name;
        $election->Election_info = $request->Election_info;
        $election-> Date = $request->Date;
        $election->Election_Type = $request->Election_Type;
        $election->save();
        
        
        // Election::create($request->only(['Name', 'Election_info','Date','Election_Type']));
        //Dynamic Candidate Creation
        $c = count($request->Candidate_Name);
        for($i=0;$i<$c;$i++){
            
            $candidate = new Candidate();
            $candidate->Candidate_Name = $request->Candidate_Name[$i];
            $candidate->Position = $request->Position[$i];
            $candidate->Age = $request->Age[$i];
            $candidate->Political_Party = $request->Political_Party[$i];
            $candidate->Candidate_Info = $request->Candidate_Info[$i];
            $candidate->Election_id = $election->id;
            $candidate->save();
        }
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
        if(!empty($election))
        {
            $candidates = Candidate::where('Election_id',$election->id)->cursor();
            // $candidates = Candidate::all();
            return view('election.show',compact('election','candidates'));}
        else
        { 
            return view('election.create');
        }
    }
}