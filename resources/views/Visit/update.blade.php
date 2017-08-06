@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div class="panel panel-default">
                <div class="panel-heading">Add Visit Information</div>
                <div class="panel-body">
                @foreach($visits as $visit)
                	 <form class="form-horizontal" method="POST" action="../updatevisits../{{$visit->id}}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Employee Name</label>
                            <div class="col-md-6">
                                <select name="employee">
                            @foreach($user as $employee)
                            
								  <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                  {{$visits->employeeName}}
							@endforeach
								</select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Customer Name</label>
                            <div class="col-md-6">
                                <select name="customer">
                            @foreach($customer as $cust)
                            
								  <option value="{{ $cust->id }}">{{ $cust->customerName }}</option>{{$visits->->customer}}
							@endforeach
								</select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Visit Date</label>
                            <div class="col-md-6">
                                <input type="date" name="date" value="{{$visits->date}}" class="form-control">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Visit Address</label>
                            <div class="col-md-6">
                                <input type="text" name="address" value="{{$visits->address}}" class="form-control">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Visit Summery</label>
                            <div class="col-md-6">
                            <textarea name="summery" class="form-control">{{$visits->summery}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Update" class="btn btn-success form-control text-center">
                        </div>
                </div>
		</div>
	</div>
</div>
@endsection