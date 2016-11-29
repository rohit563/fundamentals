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
                        <button  class="btn btn-success" value = "View Reults">
                        <i class="fa fa-btn fa-elections"></i> View Results 
                        </button>
                        </div>
                    </form>
                    <h5 style = "text-align:center;">Total Elections Count: {{$count}}</h5>
                    <h5 style = "text-align:center;">Total Candidates Count: {{$ccount}}</h5>
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
                                        <form class="form-horizontal" role="form" method="get" action="{{ url('/election/'.$election->id.'/vote') }}">
                                            <div class="text-center">
                                            <button type="submit" class="btn btn-danger" value = "Vote">
                                            <i class="fa fa-btn fa-elections"></i> Vote 
                                            </button>
                                            </div>
                                        </form>
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
                                        <form class="form-horizontal" role="form" method="get" action="{{ url('/election/'.$election->id) }}">
                                            <div class="text-center">
                                            <button type="submit" class="btn btn-primary" value = "Vote">
                                            <i class="fa fa-btn fa-elections"></i> Vote 
                                            </button>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <form class="form-horizontal" role="form" method="get" action="{{ url('/election/'.$election->id) }}">
                                            <div class="text-center">
                                            <button type="submit" class="btn btn-danger" value = "Vote">
                                            <i class="fa fa-btn fa-elections"></i> Vote 
                                            </button>
                                            </div>
                                        </form>
                                    </td>
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
                                    <th style = "text-align:center">View Election</th>
                                    <th style = "text-align:center">Vote in Election</th>
                                @foreach($elections->where('Election_Type','Locall') as $key=>$election)
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
                                        <form class="form-horizontal" role="form" method="get" action="{{ url('/election/'.$election->id) }}">
                                            <div class="text-center">
                                            <button type="submit" class="btn btn-primary" value = "Vote">
                                            <i class="fa fa-btn fa-elections"></i> Vote 
                                            </button>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <form class="form-horizontal" role="form" method="get" action="{{ url('/election/'.$election->id) }}">
                                            <div class="text-center">
                                            <button type="submit" class="btn btn-danger" value = "Vote">
                                            <i class="fa fa-btn fa-elections"></i> Vote 
                                            </button>
                                            </div>
                                        </form>
                                    </td>
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
</div>
@endsection