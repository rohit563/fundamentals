@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Election Form
                 <div style="float:right;" align="right">
                 @if(Auth::user()->type <= 2)
                        <a id="edit" onclick="edit();" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                        <a id="cancel" style="display: none;" onclick="cancel()" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
                        <script type="text/javascript">
                            function edit() {
                                document.getElementById("edit").style = "display:none";
                                document.getElementById("cancel").style = "display:block;";
                                document.getElementById("submit").style = "display:block;";
                                document.getElementById("back").style = "display:none;";
                                
                                document.getElementById("Name").readOnly = false;
                                document.getElementById("Election_info").readOnly = false;
                                document.getElementById("Date").readOnly = false;
                                var cn = document.getElementsByName("Candidate_Name");
                                var i;
                                for (i = 0; i < cn.length; i++) {
                                    if (cn[i].type == "text") {
                                        cn[i].readOnly = false;
                                    }
                                }
                                var a = document.getElementsByName("Age");
                                for (i = 0; i < a.length; i++) {
                                    if (a[i].type == "text") {
                                        a[i].readOnly = false;
                                    }
                                }
                                var p = document.getElementsByName("Political_Party");
                                for (i = 0; i < p.length; i++) {
                                    if (p[i].type == "text") {
                                        p[i].readOnly = false;
                                    }
                                }
                                var ci = document.getElementsByName("Candidate_Info");
                                for (i = 0; i < ci.length; i++) {
                                    if (ci[i].type == "text") {
                                        ci[i].readOnly = false;
                                    }
                                }
                            }
                            function cancel() {
                            	document.getElementById("cancel").style.display = "none";
                                document.getElementById("edit").style.display = "block";
                                document.getElementById("submit").style.display = "none";
                                document.getElementById("back").style.display = "block";
                                
                                document.getElementById("Name").readOnly = true;
                                document.getElementById("Election_info").readOnly = true;
                                document.getElementById("Date").readOnly = true;
                                var cn = document.getElementsByName("Candidate_Name");
                                for (i = 0; i < cn.length; i++) {
                                    if (cn[i].type == "text") {
                                        cn[i].readOnly = true;
                                    }
                                }
                                var a = document.getElementsByName("Age");
                                for (i = 0; i < a.length; i++) {
                                    if (a[i].type == "text") {
                                        a[i].readOnly = true;
                                    }
                                }
                                var p = document.getElementsByName("Political_Party");
                                for (i = 0; i < p.length; i++) {
                                    if (p[i].type == "text") {
                                        p[i].readOnly = true;
                                    }
                                }
                                var ci = document.getElementsByName("Candidate_Info");
                                for (i = 0; i < ci.length; i++) {
                                    if (ci[i].type == "text") {
                                        ci[i].readOnly = true;
                                    }
                                }
                            }
                            
                        </script>
                @endif 
                    </div></div>
                <div class="panel-body">
                     <form class="form-horizontal" role="form" method="POST" action= "{{url('/election/'.$election->id)}}">
                        {{ csrf_field() }}
                        @if (Session::has('message'))
                            <div class="alert alert-success">
                                <p>{{ Session::get('message') }}</p>
                            </div>
                        @endif
                <input type="hidden" name="_method" value="PUT">
                        <div>
                            <label for="Name" class="col-md-4 control-label">Election Name</label>
                            <div class="col-md-6 {{ $errors->has('Name') ? ' has-error' : '' }}">
                                <input id="Name" type="Text" class="form-control" name="Name" value ="{{$election->Name}}" readonly >
                                @if ($errors->has('Name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Name') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                         <div>
                            <label for="Election_info" class="col-md-4 control-label">Election Info</label>
                            <div class="col-md-6">
                                <input type="text" name="Election_info" id="Election_info" class="form-control" value ="{{$election->Election_info}}" readonly>
                            </div>
                        </div>
                        <div>
                            <label for="Date" class="col-md-4 control-label">Election Date</label>
                            <div class="col-md-6">
                                <input type="date" name="Date" id="Date" class="form-control" value ="{{$election->Date}}" readonly>
                            </div>
                        </div>
                        <div>
                            <label for="Election_Type" class="col-md-4 control-label">Election Type</label>
                            <div class="col-md-6">
                                <h5>{{$election->Election_Type}}</h5>
                            </div>
                        </div>
                        <div>
                        
                            <div id="candidateList">
                                @foreach($candidates as $key=>$candidate)
                                <label class="col-md-4 control-label for="Candidate_Name[]"">Candidate {{$key+1}}</label>
                                <div class="col-md-6">
                                    <input type="text" name="Candidate_Name" id="Candidate_Name[]" class="form-control" value ="{{$candidate->Candidate_Name}}" readonly>
                                </div>
                                <label class="col-md-4 control-label for="Position"">Position</label>
                                <div class="col-md-6">
                                        <h5 name="Position">{{$candidate->Position}}</h5>
                                    </div>
                                <label class="col-md-4 control-label for="Age"">Age</label>
                                    <div class="col-md-6">
                                        <input type="text" name="Age" id="Age[]" class="form-control" value ="{{$candidate->Age}}" readonly>
                                    </div>
                                <label class="col-md-4 control-label for="Political_Party"">Political Party</label>
                                    <div class="col-md-6">
                                        <h5 name= "Political_Party">{{$candidate->Political_Party}}</h5>
                                    </div>
                                <label class="col-md-4 control-label for="Candidate_Info"">Candidate {{$key+1}} Info</label>
                                <div class="col-md-6">
                                    <input type="text" name="Candidate_Info" id="Candidate_Info[]" class="form-control" value="{{$candidate->Candidate_Info}}" readonly>
                                </div>
                                    <br>
                                @endforeach
                            </div>
                    </form>        
                            <div class="col-md-6 col-md-offset-4 ">
                                <!--<form class="form-horizontal" role="form" method="get" action="{{ url('/election/'.$election->id) }}">-->
                                <button id="submit" type="submit"class="btn btn-primary" style="display:none;">
                                    <i class="fa fa-btn fa-user"></i> Update
                                </button>
                                <!--</form>-->
                                <!--<form class="form-horizontal" role="form" method="get" action="{{ url('/'.Auth::user()->type) }}">-->
                                <form class="form-horizontal" role="form" method="get" action="{{ url('/') }}">
                                <button type="submit" class="btn btn-primary" value = "View Elections" id = "back">
                                <i class="fa fa-btn fa-elections"></i> Back to All Elections 
                                </button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection