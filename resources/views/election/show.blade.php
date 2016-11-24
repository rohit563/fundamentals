@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Election Form</div>
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
@endsection