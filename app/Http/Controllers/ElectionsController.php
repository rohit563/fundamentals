<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use DB;
use App\Election;
use App\Candidate;
use App\Vote;

class ElectionsController extends Controller
{
    public function update(Request $request,$id)
    { 
        $election = Election::find($id);
        $election->Name = $request->Name;
        $election->Election_info= $request->Election_info;
        $election->Date = $request->Date;
        $election->save();


        $candidates= Candidate::where('Election_id',$election->id)->get();
        $c = count($candidates);
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
        $election = new Election();
        $election->Name = $request->Name;
        $election->Election_info = $request->Election_info;
        $election-> Date = $request->Date;
        $election->Election_Type = $request->Election_Type;
        $election->State = $request->State;
        $election->precinctID = $request->precinctID;
        
        $election->save();
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
        $precincts = \DB::table('precincts')->get();
        $pcount = count($precincts);
        return view('election.create',compact('precincts','pcount'));
    }
    public function show($id)
    {
        $election = Election::find($id);
        $precincts = \DB::table('precincts')->get();
        $pcount = count($precincts);
        if(!empty($election))
        {
            $candidates = Candidate::where('Election_id',$id)->cursor();
            return view('election.show',compact('election','candidates','precincts'));}
        else
        { 
            return view('election.create',compact('precincts','pcount'));
        }
    }
    public function results()
    {
        $elections = Election::all();
        $candidates = Candidate::all();
        $count = $elections->count();
        $ccount = $candidates->count();
        // $elections = DB::table('elections')->get();
        // $candidates = DB::table('candidates')->get();
        return view('election.results',compact('elections','candidates','ccount','count'));
    }
    public function vote($id)
    {
        $election = Election::find($id);
        if(!empty($election))
        {
            $candidates = Candidate::where('Election_id',$id)->cursor();
            // return view('election.show',compact('election','candidates'));
            return view('election.vote',compact('election','candidates'));
            
        }
        
        $vote->User_id = Auth::user()->id;
        $vote->Election_id = $election->id;
        $vote->Candidate_id = $request->vote;
        return redirect()->back()->with('message','You voted successfully');
    }
}