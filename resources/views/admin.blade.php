@extends('layouts.app')
@section('content')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" ></script>
    <script type="text/javascript">
$(document).ready(function() {
// Create two variable with the names of the months and days in an array
var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

// Create a newDate() object
var newDate = new Date();
// Extract the current date from Date object
newDate.setDate(newDate.getDate());
// Output the day, date, month and year   
$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

setInterval( function() {
	// Create a newDate() object and extract the seconds of the current time on the visitor's
	var seconds = new Date().getSeconds();
	// Add a leading zero to seconds value
	$("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
	},1000);
	
setInterval( function() {
	// Create a newDate() object and extract the minutes of the current time on the visitor's
	var minutes = new Date().getMinutes();
	// Add a leading zero to the minutes value
	$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
    },1000);
	
setInterval( function() {
	// Create a newDate() object and extract the hours of the current time on the visitor's
	var hours = new Date().getHours();
	// Add a leading zero to the hours value
	$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
    }, 1000);	
});
</script>
<style>
table, th, td {
   border: 1px solid black;
   padding:.25em;
}
th {
    background-color: #0086b3;
    color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
<div class="container">
    <div class="row">
        
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>
                <div class="panel-body">
                    <div class="clock">
                      <table style="border:none">
                          <tr style="border:none">
                              <td id="hours"  style="border:none">:</td>
                              <td id="point"  style="border:none; padding:none;">:</td>
                              <td id="min" style="border:none; padding:none;"></td>
                              <td id="point" style="border:none; padding:none;">:</td>
                              <td id="sec" style="border:none;padding:none;"></td>
                          </tr>
                      </table>
                    </div>
                    <h5 >Time: {{$date}} </h5>
                    <h5 style = "text-align:center;">Total Elections Count: {{$count}}</h5>
                    <h5 style = "text-align:center;">Total Candidates Count: {{$ccount}}</h5>
                    <div class="col-md-10 col-md-offset-1 ">
                        <div class="panel panel-default">
                            <div class="panel-heading">National Elections</div>
                            <div class="panel-body" style = "text-align:center">
                                <table style="margin: 0 auto; width:100%;text-align:center">
                                    <th style = "text-align:center">Election Name</th>
                                    <th style = "text-align:center">Election Info</th>
                                    <th style = "text-align:center">View Election</th>
                                    <th style = "text-align:center">Start Date</th>
                                    <th style = "text-align:center">Stop Date</th>
                                @foreach($elections->where('Election_Type','National') as $election)
                                <tr>
                                    <td>{{$election->Name}}</td>
                                    <td>{{$election->Election_info}}</td>
                                    <td>
                                        <form class="form-horizontal" role="form" method="get" action="{{ url('/election/'.$election->id) }}">
                                            <div class="text-center">
                                            <button type="submit" class="btn btn-primary" value = "View Election">
                                            <i class="fa fa-btn fa-elections"></i> View Election 
                                            </button>
                                            </div>
                                        </form>
                                    </td>
                                    <td>{{$election->startDate}}</td>
                                    <td>{{$election->endDate}}</td>
                                </tr>
                                @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">State Elections</div>
                            <div class="panel-body" style = "text-align:center">
                                <table style="margin: 0 auto; width:100%;text-align:center">
                                    <th style = "text-align:center">Election Name</th>
                                    <th style = "text-align:center">Election Info</th>
                                    <th style = "text-align:center">View Election</th>
                                    <th style = "text-align:center">Start Date</th>
                                    <th style = "text-align:center">Stop Date</th>
                                @foreach($elections->where('Election_Type','State') as $key=>$election)
                                <tr>
                                    <td>{{$election->Name}}</td>
                                    <td>{{$election->Election_info}}</td>
                                    </td>
                                    <td>
                                        <form class="form-horizontal" role="form" method="get" action="{{ url('/election/'.$election->id) }}">
                                            <div class="text-center">
                                            <button type="submit" class="btn btn-primary" value = "View Election">
                                            <i class="fa fa-btn fa-elections"></i> View Election 
                                            </button>
                                            </div>
                                        </form>
                                    </td>
                                    <td>{{$election->startDate}}</td>
                                    <td>{{$election->endDate}}</td>
                                </tr>
                                @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">Local Elections</div>
                            <div class="panel-body" style = "text-align:center">
                                <table style="margin: 0 auto; width:100%;text-align:center">
                                    <th style = "text-align:center">Election Name</th>
                                    <th style = "text-align:center">Election Info</th>
                                    <th style = "text-align:center">View Election</th>
                                    <th style = "text-align:center">Start Date</th>
                                    <th style = "text-align:center">Stop Date</th>
                                @foreach($elections->where('Election_Type','Local') as $key=>$election)
                                <tr>
                                    <td>{{$election->Name}}</td>
                                    <td>{{$election->Election_info}}</td>
                                    </td>
                                    <td>
                                        <form class="form-horizontal" role="form" method="get" action="{{ url('/election/'.$election->id) }}">
                                            <div class="text-center">
                                            <button type="submit" class="btn btn-primary" value = "View Election">
                                            <i class="fa fa-btn fa-elections"></i> View Election 
                                            </button>
                                            </div>
                                        </form>
                                    </td>
                                    <td>{{$election->startDate}}</td>
                                    <td>{{$election->endDate}}</td>
                                </tr>
                                @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form class="form-horizontal" role="form" method="get" action="{{ url('/election/create') }}">
        <button type = "submit" class="btn btn-default btn-circle"><i class="glyphicon glyphicon-plus"></i></button>
        </form>
    </div>
</div>
@endsection