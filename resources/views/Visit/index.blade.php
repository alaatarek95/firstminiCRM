@extends('layouts.app')

@section('content')
<div class="container">
    <div class="table-responsive">
        <table class="table">
        <tr>
            <th>Visit Id</th>
            <th>Employee Name</th>
            <th>Customer Name</th>
            <th>Visit Date</th>
            <th>Visit Type</th>
            <th>Visit Summery</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <tr>
        @foreach ($visits as $visit)
            <td>{{$visit->id}}</td>
            <td>{{$visit->employeeName}}</td>
            <td>{{$visit->customerName}}</td>
            <td>{{$visit->date}}</td>
            <td>{{$visit->type}}</td>
            <td>{{$visit->summery}}</td>
            <td><a href="updatevisits/{{$visit->id}}" class="btn btn-primary" role="button">Edit</a></td>
            <td><a href="delete/{{$visit->id}}" class="btn btn-danger" role="button">Delete</a></td>
        @endforeach
        </tr>
        </table>
    </div>
</div>
@endsection