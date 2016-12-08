@extends('layouts.app')

@section('content')
<style>
table, th, td {
   border: 1px solid black;
   padding:.25em;
}
th {
    background-color: #0086b3;
    color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Results of All Elections</div>
                <div class="panel-body">
                    <h5 style = "text-align:center;">Total Elections Count: {{$count}}</h5>
                    <h5 style = "text-align:center;">Total Candidates Count: {{$ccount}}</h5>
                    <div class="col-md-10 col-md-offset-1 ">
                        <div class="panel panel-default">
                            <div class="panel-heading">National Elections</div>
                            <div class="panel-body" style = "text-align:center">
                               <table style="margin: 0 auto; width:100%;text-align:center">
                                    <th style = "text-align:center">Election Name</th>
                                    <th style = "text-align:center">Election Info</th>
                                    <th style = "text-align:center">Total Votes</th>
                                @foreach($elections->where('Election_Type','National') as $election)
                                    @if($election->isPublished == 1)
                                        @if($time > $election->endDate)
                                        <tr>
                                            <td>{{$election->Name}}</td>
                                            <td>{{$election->Election_info}}</td>
                                            <td>
                                            @foreach($candidates as $candidate)
                                                @if($election->id == $candidate->Election_id)
                                                    <h5>{{$candidate->Candidate_Name}}:  {{count($votes->where('Candidate_id',$candidate->id))}} Votes</h5>
                                                @endif
                                            @endforeach
                                            </td>
                                        </tr>
                                        @endif
                                    @endif
                                @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">State Elections</div>
                            <div class="panel-body" style = "text-align:center">
                                 <table style="margin: 0 auto; width:100%;text-align:center">
                                    <th style = "text-align:center">Election Name</th>
                                    <th style = "text-align:center">Election Info</th>
                                    <th style = "text-align:center">Total Votes</th>
                                @foreach($elections->where('Election_Type','State') as $election)
                                    @if($election->isPublished == 1)
                                        @if($time > $election->endDate)
                                        <tr>
                                            <td>{{$election->Name}}</td>
                                            <td>{{$election->Election_info}}</td>
                                            <td>
                                            @foreach($candidates as $candidate)
                                                @if($election->id == $candidate->Election_id)
                                                    <h5>{{$candidate->Candidate_Name}}:  {{count($votes->where('Candidate_id',$candidate->id))}} Votes</h5>
                                                @endif
                                            @endforeach
                                            </td>
                                        </tr>
                                        @endif
                                    @endif
                                @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">Local Elections</div>
                            <div class="panel-body" style = "text-align:center">
                                 <table style="margin: 0 auto; width:100%;text-align:center">
                                    <th style = "text-align:center">Election Name</th>
                                    <th style = "text-align:center">Election Info</th>
                                    <th style = "text-align:center">Total Votes</th>
                                @foreach($elections->where('Election_Type','Local') as $election)
                                    @if($election->isPublished == 1)
                                        @if($time > $election->endDate)
                                        <tr>
                                            <td>{{$election->Name}}</td>
                                            <td>{{$election->Election_info}}</td>
                                            <td>
                                            @foreach($candidates as $candidate)
                                                @if($election->id == $candidate->Election_id)
                                                    <h5>{{$candidate->Candidate_Name}}:  {{count($votes->where('Candidate_id',$candidate->id))}} Votes</h5>
                                                @endif
                                            @endforeach
                                            </td>
                                        </tr>
                                        @endif
                                    @endif
                                @endforeach
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
