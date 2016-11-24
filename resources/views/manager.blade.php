@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Manager Dashboard</div>
                
                <div class="panel-body">
<<<<<<< HEAD
                    <h5>Total Elections Count: {{$count}}</h5>
                
                    <div class="col-md-10 col-md-offset-1 ">
                        <div class="panel panel-default">
                            <div class="panel-heading">National Elections</div>
                            <div class="panel-body">
                                @foreach($elections->where('Election_Type','National') as $key=>$election)
                                <h5 style = "background-color:#f5f5f5;" align = "center">Election: {{$election->Name}}</h5>
                                <h5 style = "word-wrap: break-word;">Election info: {{$election->Election_info}}</h5>
                                <form class="form-horizontal " role="form" method="get" action="{{ url('/election/'.$election->id) }}">
                                    <div class="text-center">
                                    <button type="submit" class="btn btn-primary" value = "View Election">
                                    <i class="fa fa-btn fa-elections"></i> View Election 
                                    </button>
                                    </div>
                                </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-default">
                            <div style ="text-align:center;" class="panel-heading">State Elections</div>
                            <div class="panel-body">
                                @foreach($elections->where('Election_Type','State') as $key=>$election)
                                <h5 style = "background-color:#f5f5f5;" align = "center">Election: {{$election->Name}}</h5>
                                <h5 style = "word-wrap: break-word;">Election info: {{$election->Election_info}}</h5>
                                <form class="form-horizontal" role="form" method="get" action="{{ url('/election/'.$election->id) }}" style ="margin:auto; display:block;">
                                    <div class="text-center">
                                    <button type="submit" class="btn btn-primary" value = "View Election">
                                    <i class="fa fa-btn fa-elections"></i> View Election 
                                    </button>
                                    </div>
                                </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">Local Elections</div>
                            <div class="panel-body">
                                @foreach($elections->where('Election_Type','Local') as $key=>$election)
                                <h5 style = "background-color:#f5f5f5;" align = "center">Election: {{$election->Name}}</h5>
                                <h5 style = "word-wrap: break-word;">Election info: {{$election->Election_info}}</h5>
                                <form class="form-horizontal" role="form" method="get" action="{{ url('/election/'.$election->id) }}">
                                    <div class="text-center">
                                    <button type="submit" class="btn btn-primary" value = "View Election">
                                    <i class="fa fa-btn fa-elections"></i> View Election 
                                    </button>
                                    </div>
                                </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
=======
                    You are logged in!
>>>>>>> parent of 70c293d... User can't edit /update elections, as it should be. Editing and updating them through manager doesn't work though
                </div>
            </div>
        </div>
        <form class="form-horizontal" role="form" method="get" action="{{ url('/election/create') }}">
        <button type = "submit" class="btn btn-default btn-circle"><i class="glyphicon glyphicon-plus"></i></button>
        </form>
    </div>
<<<<<<< HEAD
=======
    
        <div class="col-md-3 col-md-offset-1">
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
        <div class="col-md-4 col-md-offset-.75">
            <div class="panel panel-default">
                <div style ="text-align:center;" class="panel-heading">State Elections</div>
                <div class="panel-body">
                    @foreach($elections->where('Election_Type','State') as $key=>$election)
                    <h5 style = "background-color:#f5f5f5;" align = "center">Election: {{$election->Name}}</h5>
                    <h5 style = "word-wrap: break-word;">Election info: {{$election->Election_info}}</h5>
                    <form class="form-horizontal" role="form" method="get" action="{{ url('/election/'.$election->id) }}" style ="margin:auto; display:block;">
                        <button type="submit" class="btn btn-primary" value = "View Election" >
                        <i class="fa fa-btn fa-elections"></i> View Election 
                        </button>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-3 col-md-offset-.75">
            <div class="panel panel-default">
                <div class="panel-heading">Local Elections</div>
                <div class="panel-body">
                    @foreach($elections->where('Election_Type','Local') as $key=>$election)
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
        <br
                    <h1>Total Elections Count: {{$count}}</h1>
        
>>>>>>> parent of 70c293d... User can't edit /update elections, as it should be. Editing and updating them through manager doesn't work though
</div>
@endsection