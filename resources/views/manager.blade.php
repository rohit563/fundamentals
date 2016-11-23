@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Manager Dashboard</div>
                
                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
        <form class="form-horizontal" role="form" method="get" action="{{ url('/election/create') }}">
        <button type = "submit" class="btn btn-default btn-circle"><i class="glyphicon glyphicon-plus"></i></button>
        </form>
        <!--<button type = "button" onclick="window.location = 'election/create';"  class="btn btn-default btn-circle"><i class="glyphicon glyphicon-plus"></i></button>-->
    </div>
    
        <div class="col-md-2 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">National Elections</div>
                <div class="panel-body">
                    @foreach($elections->where('Election_Type','National') as $key=>$election)
                    <h5 style = "background-color:#f5f5f5;" align = "center">Election: {{$election->Name}}</h5>
                    <h5 style = "word-wrap: break-word;">Election info: {{$election->Election_info}}</h5>
                    <form class="form-horizontal" role="form" method="get" action="{{ url('/election/'.$election->id) }}">
                        <button type="submit" class="btn btn-primary" value = "View Election" text-align = "center">
                        <i class="fa fa-btn fa-elections"></i> View Election 
                        </button>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-2 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">State Elections</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="get" action="{{ url('/election/2') }}">
                        <button type="submit" class="btn btn-primary" value = "View Elections" text-align = "center">
                        <i class="fa fa-btn fa-elections"></i> View Election 
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Local Elections</div>

                <div class="panel-body">
                   <form class="form-horizontal" role="form" method="get" action="{{ url('/election/3') }}">
                        <button type="submit" class="btn btn-primary" value = "View Elections" text-align = "center">
                        <i class="fa fa-btn fa-elections"></i> View Election 
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <br
                    <h1>Total Elections Count: {{$count}}</h1>
        
</div>
@endsection