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
                                    @foreach($candidates as $key=>$candidate)
                                    <th style = "text-align:center"> {{$candidate->Candidate_Name}}</th>
                                    @endforeach
                                <tr>
                                    <td>{{$election->Name}}</td>
                                    <td>{{$election->Election_info}}</td>
                                    <td>Total Votes</td>
                                    @foreach($candidates as $key=>$candidate)
                                        @if($election->id == $candidate->Election_id)
                                        <td>X Votes</td>
                                        @endif
                                    @endforeach
                                </tr>
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
                                @foreach($elections->where('Election_Type','State') as $key=>$election)
                                <tr>
                                    <td>{{$election->Name}}</td>
                                    <td>{{$election->Election_info}}</td>
                                    
                                </tr>
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
                                @foreach($elections->where('Election_Type','Locall') as $key=>$election)
                                <tr>
                                    <td>{{$election->Name}}</td>
                                    <td>{{$election->Election_info}}</td>
                                    
                                </tr>
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
