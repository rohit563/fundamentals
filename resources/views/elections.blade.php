@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>
                <div class="panel-body">
                     <form class="form-horizontal" role="form" method="POST" action="{{ url('/elections') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
    
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Candidate Name</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name">
                                </div>
                            </div>
                             <div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
                                <label for="running_mate" class="col-md-4 control-label">Running Mate</label>
    
                                <div class="col-md-6">
                                    <input id="running_mate" type="text" class="form-control" name="running_mate">
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="political_party" class="col-md-4 control-label">Political Party</label>
    
                                <div class="col-md-6">
                                    <input id="political_party" type="text" class="form-control" name="political_party">
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
                                <label for="about" class="col-md-4 control-label">About</label>
    
                                <div class="col-md-6">
                                    <input id="about" type="textarea" class="form-control" name="about">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-elections"></i> Update
                                    </button>
                                </div>
                            </div>
                            <!--</input>-->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
