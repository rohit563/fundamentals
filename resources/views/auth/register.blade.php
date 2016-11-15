@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">username</label>
                            <div class="col-md-6">
                                <?php
                                    $var = uniqid();
                                    echo "<input id='username' type='username' class='form-control' name='username' value='{$var}'>";
                                ?>
                                <script type="text/javascript">
                                    document.getElementById("username").readOnly = true;
                                </script>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                            <label for="dob" class="col-md-4 control-label">DOB</label>

                            <div class="col-md-6">
                                <?php
                                    $var = uniqid();
                                    echo "<input id='dob' type='date' class='form-control' name='dob' value='{$var}'";
                                ?>
                                <br>
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('driversLicense') ? ' has-error' : '' }}">
                            <label for="driversLicense" class="col-md-4 control-label">Drivers License #</label>

                            <div class="col-md-6">
                                <input id="driversLicense" type="driversLicense" class="form-control" name="driversLicense" value="" onkeyup="disableText2()" onclick="disableText2()" onchange="disableText2()">
                                <script type="text/javascript">
                                    function disableText2(){
                                        if(document.getElementById('driversLicense').value != ""){
                                            document.getElementById("passport").readOnly = true;
                                            // document.getElementById('passport').value = "null";
                                            document.getElementById("driversLicense").readOnly = false;
                                        }
                                        else {
                                            document.getElementById("passport").readOnly = false;
                                            // document.getElementById('passport').value = '';
                                        }
                                    }
                                </script>
                                @if ($errors->has('driversLicense'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('driversLicense') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <label class="col-md-7 control-label">or</label>
                        <br></br>
                        <div class="form-group{{ $errors->has('passport') ? ' has-error' : '' }}">
                            <label for="passport" class="col-md-4 control-label">Passport #</label>

                            <div class="col-md-6">
                                <input id="passport" type="passport" class="form-control" name="passport" value="" onkeyup="disableText()" onclick="disableText()" onchange="disableText()">
                                <script type="text/javascript">
                                    function disableText(){
                                        if(document.getElementById('passport').value != ""){
                                            document.getElementById("driversLicense").readOnly= true;
                                            // document.getElementById('driversLicense').value = "null";
                                            document.getElementById("passport").readOnly = false;
                                        }
                                        else {
                                            document.getElementById("driversLicense").readOnly = false;
                                            // document.getElementById('driversLicense').value = '';
                                        }
                                    }
                                </script>
                                @if ($errors->has('passport'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('passport') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         <div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
                            <label for="address1" class="col-md-4 control-label">Address 1</label>

                            <div class="col-md-6">
                                <input id="address1" type="address1" class="form-control" name="address1" value="{{ old('address1') }}">

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
                                <input id="address2" type="address2" class="form-control" name="address2" value="{{ old('address2') }}">

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
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}">

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
                                <input id="state" type="text" class="form-control" name="state" value="{{ old('state') }}">

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
                                <input id="zip" type="zip" class="form-control" name="zip" value="{{ old('zip') }}">

                                @if ($errors->has('zip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                                <label for="male">Male</label>
                                <input input id="gender" type="radio" name="gender" value="1"/>
                                <label for="male">Female</label>
                                <input input id="gender" type="radio" name="gender" value="0"/>
                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
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
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
