@extends('layouts.app')

@section('content')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" ></script>
    <script type="text/javascript">
        //when the webpage has loaded do this
        $(document).ready(function() {  
            //if the value within the dropdown box has changed then run this code            
            $('#num_cand').change(function(){
                //get the number of fields required from the dropdown box
                var num = $('#num_cand').val();                  

                var i = 0; //integer variable for 'for' loop
                var html = ''; //string variable for html code for fields 
                //loop through to add the number of fields specified
                // id ="Candidate_Name[]"
                // name="Candidate[' + (i-1) +']"
                for (i=1;i<=num;i++) {
                    //concatinate number of fields to a variable
                    html += '<label class="col-md-4 control-label for="Candidate_Name[]"">Candidate ' + i + '</label><div class="col-md-6"><input type="text" name="Candidate_Name[]" id="Candidate_Name[]" class="form-control" value =""/></div>'; 
                    html += '<label class="col-md-4 control-label for="Age[]"">Age</label><div class="col-md-6"><input type="text" name="Age[]" id="Age[]" class="form-control" value =""/></div>';
                    html += '<label class="col-md-4 control-label for="Political_Party[]"">Political Party</label><div class="col-md-6"><div class="col-md-6" style = "margin-top:.5em;"><select id="Political_Party[]" name="Political_Party[]"><option value="0">- SELECT -</option><option value="Republican">Republican</option><option value="Democratic">Democratic</option><option value="Other">Other</option></select></div></div>';
                    html += '<label class="col-md-4 control-label for="Candidate_Info[]"">Candidate Info</label><div class="col-md-6"><input type="text" name="Candidate_Info[]" id="Candidate_Info[]" class="form-control" value=""/></div><br>';
                }

                //insert this html code into the div with id catList
                $('#candidateList').html(html);
            });
        }); 
    </script>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Election Form</div>
                <div class="panel-body">
                     <form class="form-horizontal" role="form" method="post" action="{{ url('/election') }}">
                        {{ csrf_field() }}
                        @if (Session::has('message'))
                            <div class="alert alert-success">
                                <p>{{ Session::get('message') }}</p>
                            </div>
                        @endif
                        <input type="hidden" name="_method" value="POST">
    
                            <div>
                                <label for="name" class="col-md-4 control-label">Election Name</label>
    
                                <div class="col-md-6">
                                    <input id="Name" type="Text" class="form-control" name="Name">
                                </div>
                            </div>
                             <div>
                                <label for="Election_info" class="col-md-4 control-label">Election Info</label>
    
                                <div class="col-md-6">
                                    <input type="text" name="Election_info" id="Election_info" class="form-control">
                                </div>
                            </div>
                            <div>
                                <label for="Date" class="col-md-4 control-label">Election Date</label>
    
                                <div class="col-md-6">
                                    <input type="date" name="Date" id="Date" class="form-control">
                                </div>
                            </div>
                            <div>
                                <label for="Election_Type" class="col-md-4 control-label">Election Type</label>
    
                                <div class="col-md-6" style = "margin-top:.5em;">
                                <select id="Election_Type" name="Election_Type">
                                    <option value="0">- SELECT -</option>
                                    <option value="National">National</option>
                                    <option value="State">State</option>
                                    <option value="Local">Local</option>
                                </select>
                                </div>
                            </div>
                            <div >
                            <label for="Number_of-Candidates" class="col-md-4 control-label">Number of Candidates</label>
    
                            <div class="col-md-6" style = "margin-top:.5em;">
                                <select id="num_cand" name="num_cand">
                                    <option value="0">- SELECT -</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                            <div id="candidateList"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4" align = "center" style = "margin-top:.2em;margin-bottom:.2em;">
                                    <button type="submit" class="btn btn-primary" value = "Create_Election" text-align = "center"
                                        <i class="fa fa-btn fa-elections"></i> Create Election
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