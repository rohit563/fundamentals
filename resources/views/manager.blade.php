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
                <div class="panel-heading">Manager Dashboard</div>
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
                                    <th style = "text-align:center">View Election</th>
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
        <form class="form-horizontal" role="form" method="get" action="{{ url('/election/create') }}">
        <button type = "submit" class="btn btn-default btn-circle"><i class="glyphicon glyphicon-plus"></i></button>
        </form>
    </div>
</div>
@endsection