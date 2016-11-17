@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Profile
                    <div style="float:right;" align="right" >
                        <a id="edit" onclick="edit();" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                        <a id="cancel" style="display: none;" onclick="cancel()" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
                        <script type="text/javascript">
                            function edit() {
                                document.getElementById("edit").style.display = "none";
                                document.getElementById("cancel").style.display = "block";
                                document.getElementById("submit").style.display = "block";
                                
                                document.getElementById("name").readOnly = false;
                                document.getElementById("email").readOnly = false;
                                document.getElementById("address1").readOnly = false;
                                document.getElementById("address2").readOnly = false;
                                document.getElementById("city").readOnly = false;
                                document.getElementById("state").readOnly = false;
                                document.getElementById("zip").readOnly = false;
                            }
                            function cancel() {
                            	document.getElementById("cancel").style.display = "none";
                                document.getElementById("edit").style.display = "block";
                                document.getElementById("submit").style.display = "none";
                                
                                document.getElementById("name").readOnly = true;
                                document.getElementById("email").readOnly = true;
                                document.getElementById("address1").readOnly = true;
                                document.getElementById("address2").readOnly = true;
                                document.getElementById("city").readOnly = true;
                                document.getElementById("state").readOnly = true;
                                document.getElementById("zip").readOnly = true;
                            }
                            
                        </script>
                    </div>
                </div>
                <div class="panel-body">
                     <form class="form-horizontal" role="form" method="POST" action="{{ url('/profile') }}">
                        {{ csrf_field() }}
                        @if (Session::has('message'))
                            <div class="alert alert-success">
                                <p>{{ Session::get('message') }}</p>
                            </div>
                        @endif
                        <input type="hidden" name="_method" value="PUT">
    
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" readonly>
    
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" readonly>
    
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                             <div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
                                <label for="address1" class="col-md-4 control-label">Address 1</label>
    
                                <div class="col-md-6">
                                    <input id="address1" type="address1" class="form-control" name="address1" value="{{ Auth::user()->address1}}" readonly>
    
                                    @if ($errors->has('address1'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address1') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
                                <label for="address2" class="col-md-4 control-label">Address 2</label>
    
                                <div class="col-md-6">
                                    <input id="address2" type="address2" class="form-control" name="address2" value="{{ Auth::user()->address2 }}" readonly>
    
                                    @if ($errors->has('address2'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address2') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">City</label>
    
                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" name="city" value="{{ Auth::user()->city }}" readonly>
    
                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">State</label>
    
                                <div class="col-md-6">
                                    <input id="state" type="text" class="form-control" name="state" value="{{ Auth::user()->state }}" readonly>
    
                                    @if ($errors->has('state'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('state') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
                                <label for="zip" class="col-md-4 control-label">Zip Code</label>
    
                                <div class="col-md-6">
                                    <input id="zip" type="zip" class="form-control" name="zip" value="{{ Auth::user()->zip }}" readonly>
    
                                    @if ($errors->has('zip'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('zip') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button id="submit" type="submit" class="btn btn-primary" style="display: none;">
                                        <i class="fa fa-btn fa-user"></i> Update
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
