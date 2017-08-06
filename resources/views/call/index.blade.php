@extends('layouts.app')

@section('content')
<div class="container">
    <div class="table-responsive">
        <table class="table">
        <tr>
            <th>call Id</th>
            <th>Employee Name</th>
            <th>Customer Name</th>
            <th>Call Date</th>
            <th>Call Duration</th>
            <th>Call Summery</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <tr>
        @foreach ($calls as $call)
            <td>{{$call->id}}</td>
            <td>{{$call->employeeName}}</td>
            <td>{{$call->customerName}}</td>
            <td>{{$call->date}}</td>
            <td>{{$call->duration}}</td>
            <td>{{$call->summery}}</td>
            <td><a href="updatecalls/{{$call->id}}" class="btn btn-primary" role="button">Edit</a></td>
            <td><a href="delete/{{$call->id}}" class="btn btn-danger" role="button">Delete</a></td>
        @endforeach
        </tr>
        </table>
    </div>
</div>
@endsection