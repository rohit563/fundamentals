<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use DB;
use App\Election;
use App\Candidate;
use App\Vote;
use Auth;

class ElectionsController extends Controller
{
    public function update(Request $request,$id)
    { 
        $election = Election::find($id);
        $election->Name = $request->Name;
        $election->Election_info= $request->Election_info;
        $election->startDate = $request->startDate;
        $election->endDate = $request->endDate;
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
        $election->startDate = $request->startDate;
        $election->endDate = $request->endDate;
        $election->Election_Type = $request->Election_Type;
        //Create elections based on precinct
        if($request->Election_Type =="State" || $request->Election_Type=="National"){
            
        }
        $election->State = $request->State;
        $election->precinctID = $request->precinctID;
        $election->save();
        
        $precinctManager = $request->manager;
        //Problem Here
        //$precinctManager->precinctID = $election->id;
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
        $managers = \DB::table('users')->where('type',2)->get();
        $pcount = count($precincts);
        return view('election.create',compact('precincts','pcount','managers'));
    }
    public function show($id)
    {
        $election = Election::find($id);
        $precincts = \DB::table('precincts')->get();
        $managers = \DB::table('users')->where('type',2)->get();
        $pcount = count($precincts);
        if(!empty($election))
        {
            $candidates = Candidate::where('Election_id',$id)->cursor();
            return view('election.show',compact('election','candidates','precincts'));}
        else
        { 
            return view('election.create',compact('precincts','pcount','managers'));
        }
    }
    public function results()
    {
        $elections = Election::all();
        $candidates = Candidate::all();
        $count = $elections->count();
        $ccount = $candidates->count();
        $votes = Vote::all();
        // $elections = DB::table('elections')->get();
        // $candidates = DB::table('candidates')->get();
        return view('election.results',compact('elections','candidates','ccount','count','votes'));
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
    }
    public function sendvote(Request $request,$id)
    {
        $election = Election::find($id);
        if(!empty($election))
        {
            $candidates = Candidate::where('Election_id',$id)->cursor();
        
            $vote  = new Vote();
            $user = Auth::user();
            $vote->User_id = $user->id;
            $vote->Election_id = $election->id;
            $c = count($request->input('vote'));
            $vote->Candidate_id = $request->input('vote');
        }
        $vote->save();
        return redirect()->back()->with('message','You voted successfully');
    }
}