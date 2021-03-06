@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Election Form
                    <div style="float:right;" align="right">
                        @if(Auth::user()->type == 1 || Auth::user()->type == 0)
                        <a id="edit" onclick="edit();" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                        <a id="cancel" style="display: none;" onclick="cancel()" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
                        @endif
                        <script type="text/javascript">
                            function edit() {
                                document.getElementById("edit").style.display = "none";
                                document.getElementById("cancel").style.display = "block";
                                document.getElementById("submit").style.display = "block";
                                var inputs = document.getElementsByTagName('input');
                                for (var i = 0; i < inputs.length; i += 1) {
                                    inputs[i].readOnly = false;
                                }

                            }
                            function cancel() {
                            	document.getElementById("cancel").style.display = "none";
                                document.getElementById("edit").style.display = "block";
                                document.getElementById("submit").style.display = "none";
                                
                                var inputs = document.getElementsByTagName('input');
                                for (var i = 0; i < inputs.length; i += 1) {
                                    inputs[i].readOnly = true;
                                }
                            }
                            
                        </script>
                    </div>
                
                </div>
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
                            <label for="name" class="col-md-4 control-label">Election Name</label>
                            <div class="col-md-6 {{ $errors->has('Name') ? ' has-error' : '' }}">
                                <input id="Name" type="Text" class="form-control" name="Name" value ="{{$election->Name}}" readonly>
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
                        <div id = "electionTimes">
                                <label for="startDate" class="col-md-4 control-label">Start Date</label>
                                <div class="col-md-6">
                                    <h5>{{$election->startDate}}</h5>
                                </div>
                                <br>
                                <label for="startDate" class="col-md-4 control-label">End Date</label>
                                <div class="col-md-6">
                                   <h5>{{$election->endDate}}</h5>
                                </div>
                                
                        </div>
                        <div>
                            <label for="Election_Type" class="col-md-4 control-label">Election Type</label>
                            <div class="col-md-6">
                                <h5>{{$election->Election_Type}}</h5>
                            </div>
                        </div>
                        <div>
                        <div id="State">
                           <label for="StateLabel" class="col-md-4 control-label">State</label>
                           <div class="col-md-6">
                           <h5>{{$election->State}}</h5>
                           </div>
                        </div>
                        <div id="Precinct">
                           <label for="PrecinctLabel" class="col-md-4 control-label ">Precinct ID</label>
                           <div class="col-md-6 ">
                           <h5>{{$election->precinctID}}</h5>
                           </div>
                        </div><br><br>
                        
                            <div id="candidateList">
                                @foreach($candidates as $key=>$candidate)
                                <label class="col-md-4 control-label for="Candidate_Name[]"">Candidate {{$key+1}}</label>
                                <div class="col-md-6">
                                    <input type="text" name="Candidate_Name[]" id="Candidate_Name[]" class="form-control" value ="{{$candidate->Candidate_Name}}" readonly>
                                </div>
                                <label class="col-md-4 control-label for="Position[]"">Position</label>
                                <div class="col-md-6">
                                        <h5 name="Position">{{$candidate->Position}}</h5>
                                </div>
                                <label class="col-md-4 control-label for="Age[]"">Age</label>
                                    <div class="col-md-6">
                                        <input type="text" name="Age[]" id="Age[]" class="form-control" value ="{{$candidate->Age}}" readonly>
                                    </div>
                                <label class="col-md-4 control-label for="Political_Party[]"">Political Party</label>
                                    <div class="col-md-6">
                                        <h5 name= "Political_Party">{{$candidate->Political_Party}}</h5>
                                    </div>
                                <label class="col-md-4 control-label for="Candidate_Info[]"">Candidate {{$key+1}} Info</label>
                                <div class="col-md-6">
                                    <input type="text" name="Candidate_Info[]" id="Candidate_Info[]" class="form-control" value="{{$candidate->Candidate_Info}}" readonly>
                                </div>
                                    <br>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <br>
                                    <button id="submit" type="submit" class="btn btn-primary" style="display: none;">
                                        <i class="fa fa-btn fa-user"></i> Update
                                    </button>
                                </div>
                            </div>
                    </form>        
            </div>
        </div>
    </div>
</div>
@endsection