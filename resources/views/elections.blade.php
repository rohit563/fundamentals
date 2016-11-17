@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Election Form</div>
                @if ( $errors->count() > 0 )
                  <p>The following errors have occurred:</p>

                  <ul>
                    @foreach( $errors->all() as $message )
                      <li>{{ $message }}</li>
                    @endforeach
                  </ul>
                @endif
                <div class="panel-body">
                     <form class="form-horizontal" role="form" method="post" action="{{ url('/elections') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
    
                            <div>
                                <label for="name" class="col-md-4 control-label">Election Name</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name">
                                </div>
                            </div>
                             <div>
                                <label for="Election_Info" class="col-md-4 control-label">Election Info</label>
    
                                <div class="col-md-6">
                                    <input type="text" name="Election_Info" id="Election_Info" class="form-control">
                                </div>
                            </div>
                            <div>
                                <label for="Election_Date" class="col-md-4 control-label">Election Date</label>
    
                                <div class="col-md-6">
                                    <input type="date" name="Election_Date" id="Election_Date" class="form-control">
                                </div>
                            </div>
                            <div>
                                <label for="Election_Type" class="col-md-4 control-label">Election Type</label>
    
                                <div class="col-md-6">
                                    <input type="text" name="Election_Type" id="Election_Type" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" value = "Create_Election" align = "center"
                                        <i class="fa fa-btn fa-elections"></i> Create Election
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