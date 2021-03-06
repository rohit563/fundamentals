@extends('layouts.app')
@section('content')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" ></script>
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
                <div class="panel-heading">User Dashboard</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="get" action="{{ url('/results')}}">
                        <div class="text-center">
                        @if(count($elections->where('publishResults',1)) > 0) 
                        <button  class="btn btn-success">
                        <i class="fa fa-btn fa-elections"></i> View Published Results 
                        </button>
                        @endif
                        </div>
                        
                    </form>
                    <!--<h5 style = "text-align:center;">Total Elections Count: {{$count}}</h5>-->
                    <!--<h5 style = "text-align:center;">Total Candidates Count: {{$ccount}}</h5>-->
                    <br>
                    <div class="col-md-10 col-md-offset-1 ">
                        <div class="panel panel-default">
                            <div class="panel-heading">National Elections</div>
                            <div class="panel-body" style = "text-align:center">
                                <table style="margin: 0 auto; width:100%;text-align:center">
                                    <th style = "text-align:center">Election Name</th>
                                    <th style = "text-align:center">Election Info</th>
                                    <th style = "text-align:center">View Election</th>
                                    <th style = "text-align:center">Vote in Election</th>
                                @foreach($elections->where('Election_Type','National') as $election)
                                <tr>
                                    <td>{{$election->Name}}</td>
                                    <td>{{$election->Election_info}}</td>
                                    <td>
                                        <form class="form-horizontal" role="form" method="get" action="{{ url('/election/'.$election->id) }}">
                                            <div class="text-center">
                                            <button type="submit" class="btn btn-primary" value = "View Election">
                                            <i class="fa fa-btn fa-elections"></i> View Election 
                                            </button>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        @if($election->startDate < $time && $election->endDate > $time && $election->isEnabled == 1 ) 
                                        <form class="form-horizontal" role="form" method="get" action="{{ url('/election/'.$election->id.'/vote') }}">
                                            <div class="text-center">
                                            <button type="submit" class="btn btn-danger" value = "Vote">
                                            <i class="fa fa-btn fa-elections"></i> Vote 
                                            </button>
                                            </div>
                                        </form>
                                        @else
                                            <div class="text-center">
                                            <button type="button" class="btn btn-danger">Voting Not Available</button>
                                            </div>
                                        @endif
                                    </td>
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
                                    <th style = "text-align:center">View Election</th>
                                    <th style = "text-align:center">Vote in Election</th>
                                @foreach($elections->where('Election_Type','State') as $key=>$election)
                                    @if (strtoupper($election->State) == strtoupper(Auth::user()->state))
                                        <tr>
                                            <td>{{$election->Name}}</td>
                                            <td>{{$election->Election_info}}</td>
                                            </td>
                                            <td>
                                                <form class="form-horizontal" role="form" method="get" action="{{ url('/election/'.$election->id) }}">
                                                    <div class="text-center">
                                                    <button type="submit" class="btn btn-primary" value = "View Election">
                                                    <i class="fa fa-btn fa-elections"></i> View Election 
                                                    </button>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                @if($election->startDate < $time && $election->endDate > $time && $election->isEnabled == 1 ) 
                                                <form class="form-horizontal" role="form" method="get" action="{{ url('/election/'.$election->id.'/vote') }}">
                                                    <div class="text-center">
                                                    <button type="submit" class="btn btn-danger" value = "Vote">
                                                    <i class="fa fa-btn fa-elections"></i> Vote 
                                                    </button>
                                                    </div>
                                                </form>
                                                @else
                                                    <div class="text-center">
                                                    <button type="button" class="btn btn-danger">Voting Not Available</button>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
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
                                    <th style = "text-align:center">View Election</th>
                                    <th style = "text-align:center">Vote in Election</th>
                                @foreach($elections->where('Election_Type','Local') as $key=>$election)
                                    @if ($election->precinctID == Auth::user()->precinctID)
                                        <tr>
                                            <td>{{$election->Name}}</td>
                                            <td>{{$election->Election_info}}</td>
                                            </td>
                                            <td>
                                                <form class="form-horizontal" role="form" method="get" action="{{ url('/election/'.$election->id) }}">
                                                    <div class="text-center">
                                                    <button type="submit" class="btn btn-primary" value = "View Election">
                                                    <i class="fa fa-btn fa-elections"></i> View Election 
                                                    </button>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                @if($election->startDate < $time && $election->endDate > $time && $election->isEnabled == 1 ) 
                                                <form class="form-horizontal" role="form" method="get" action="{{ url('/election/'.$election->id.'/vote') }}">
                                                    <div class="text-center">
                                                    <button type="submit" class="btn btn-danger" value = "Vote">
                                                    <i class="fa fa-btn fa-elections"></i> Vote 
                                                    </button>
                                                    </div>
                                                </form>
                                                @else
                                                    <div class="text-center">
                                                    <button type="button" class="btn btn-danger">Voting Not Available</button>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
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
</div>
@endsection