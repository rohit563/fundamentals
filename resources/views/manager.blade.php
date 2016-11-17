@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <button type = "button" onclick="window.location = 'elections';"  class="btn btn-default btn-circle"><i class="glyphicon glyphicon-plus"></i></button>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Manager Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
        <div class="col-md-2 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">National Elections</div>

                <div class="panel-body">
                    Election 1
                </div>
            </div>
        </div>
        <div class="col-md-2 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">State Elections</div>

                <div class="panel-body">
                    Election 2
                </div>
            </div>
        </div>
        <div class="col-md-2 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Local Elections</div>

                <div class="panel-body">
                    Election 3
                </div>
            </div>
        </div>
</div>
@endsection