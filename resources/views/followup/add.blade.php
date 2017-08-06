@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Add Follow Up Information</div>
                <div class="panel-body">
                     <form class="form-horizontal" method="POST" action="addfollowups">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Employee Name</label>
                            <div class="col-md-6">
                                <select name="employee">
                            @foreach($user as $employee)
                            
                                  <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Customer Name</label>
                            <div class="col-md-6">
                                <select name="customer">
                            @foreach($customer as $cust)
                            
                                  <option value="{{ $cust->id }}">{{ $cust->name }}</option>
                            @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Follow Up Date</label>
                            <div class="col-md-6">
                                <input type="date" name="date"  class="form-control">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Follow Up Type</label>
                            <div class="col-md-6">
                                <input type="text" name="type"  class="form-control">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Follow Up Summery</label>
                            <div class="col-md-6">
                            <textarea name="summery" class="form-control"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group text-center">
                            <input type="submit" name="submit" value="create" class="btn btn-success " style="position: right">
                       
                        </div>
                </div>
        </div>
    </div>
</div>
@endsection