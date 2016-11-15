@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>
                <div class="panel-body">
                     <form class="form-horizontal" role="form" method="POST" action="{{ url('/profile') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
    
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
    
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
                                    <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
    
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
                                    <input id="address1" type="address1" class="form-control" name="address1" value="{{ Auth::user()->address1}}">
    
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
                                    <input id="address2" type="address2" class="form-control" name="address2" value="{{ Auth::user()->address2 }}">
    
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
                                    <input id="city" type="text" class="form-control" name="city" value="{{ Auth::user()->city }}">
    
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
                                    <input id="state" type="text" class="form-control" name="state" value="{{ Auth::user()->state }}">
    
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
                                    <input id="zip" type="zip" class="form-control" name="zip" value="{{ Auth::user()->zip }}">
    
                                    @if ($errors->has('zip'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('zip') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                <label for="type" class="col-md-4 control-label">Manager Code</label>
    
                                <div class="col-md-6">
                                    <input id="type1" type="type1" class="form-control" name="type1" value="{{ old('type') }}" onkeyup="validateNumber()" onclick="validateNumber()" onchange="validateNumber()">
                                    <input id="type" type="hidden" class="form-control" name="type" value="3">
                                    <script type="text/javascript">
                                        function validateNumber() {
                                            var first = document.getElementById('type1').value;
                                            if(first == 55555){
                                                document.getElementById('type').value = 2;
                                            }
                                            else {
                                                document.getElementById('type').value = 3;
                                            }
                                        }
                                    </script>
                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
    
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> Update
                                    </button>
                                </div>
                            </div>
                            </input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
