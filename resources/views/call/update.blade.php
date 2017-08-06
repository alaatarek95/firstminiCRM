@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div class="panel panel-default">
                <div class="panel-heading">Add Call Information</div>
                <div class="panel-body">
                	 <form class="form-horizontal" method="POST" action="../updateCalls/{{$calls->id}}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Employee Name</label>
                            <div class="col-md-6">
                                <select name="employee">
                            @foreach($user as $employee)
                            
								  <option value="{{ $employee->id }}">{{ $employee->name }}</option> {{$calls->employee}}
							@endforeach
								</select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Customer Name</label>
                            <div class="col-md-6">
                                <select name="customer">
                            @foreach($customer as $cust)
                            
								  <option value="{{ $cust->id }}">{{ $cust->name }}</option> {{$calls->customer}}
							@endforeach
								</select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Call Date</label>
                            <div class="col-md-6">
                                <input type="date" name="date" value="{{$calls->date}}"  class="form-control">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Call Duration</label>
                            <div class="col-md-6">
                                <input type="time" name="duration" value="{{$calls->duration}}"class="form-control">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Call Summery</label>
                            <div class="col-md-6">
                            <textarea name="summery" class="form-control">{{$calls->summery}}</textarea>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" name="submit" value="create" class="btn btn-success">
                        </div>
                </div>
		</div>
	</div>
</div>
@endsection