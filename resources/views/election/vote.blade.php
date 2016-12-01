@extends('layouts.app')
@section('content')
<style>
table, th, td {
   border: 1px solid black;
   padding:.25em;
   margin:0 auto;
}
th {
    background-color: #0086b3;
    color: white;
}

tr:nth-child(4n), tr:nth-child(4n+1) {
    background-color: #f2f2f2;
}
tr:nth-child(4n+2), tr:nth-child(4n+3) {
    background-color: white;
}

</style>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Voting Form
                    <div style="float:right;" align="right">
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
                     <form class="form-horizontal" role="form" method="POST" action= "{{url('/election/'.$election->id.'/vote')}}">
                        {{ csrf_field() }}
                        @if (Session::has('message'))
                            <div class="alert alert-success">
                                <p>{{ Session::get('message') }}</p>
                            </div>
                        @endif
                <input type="hidden" name="_method" value="POST">
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
                                
                                <table style="margin: 0 auto; width:100%;text-align:center">
                                    <th style = "text-align:center">Candidates</th>
                                    <th style = "text-align:center">Candidate Info </th>
                                    <th style = "text-align:center">Political Party</th>
                                    <th style = "text-align:center">Vote</th>
                                @foreach($candidates as $candidate)
                                <tr>
                                    <td>
                                        {{$candidate->Candidate_Name}}
                                    </td>
                                    <td>
                                        {{$candidate->Candidate_Info}}
                                    </td>
                                    <td>
                                        {{$candidate->Political_Party}}
                                    </td>
                                    <td><input type="radio" name="vote_[{{$candidate->id}}]"></td>
                                </tr>
                                 @endforeach
                                </table>
                            </div>
                           
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3" align = "center" style = "margin-top:.2em;margin-bottom:.2em;">
                                <button type="submit" class="btn btn-danger" value = "Vote" text-align = "center"
                                    <i class="fa fa-btn fa-elections"></i> Vote
                                </button>
                            </div>
                        </div>
                   </form> 
            </div>
        </div>
    </div>
</div>
@endsection