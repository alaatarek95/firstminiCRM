@extends('layouts.app')

@section('content')
<div class="container">
    <div class="table-responsive">
        <table class="table">
        <tr>
            <th>follow up Id</th>
            <th>Employee Name</th>
            <th>Customer Name</th>
            <th>follow up Date</th>
            <th>follow up Type</th>
            <th>follow up Summery</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        @foreach ($followups as $followup)
        <tr>
        
            <td>{{$followup->id}}</td>
            <td>{{$followup->employeeName}}</td>
            <td>{{$followup->customerName}}</td>
            <td>{{$followup->date}}</td>
            <td>{{$followup->type}}</td>
            <td>{{$followup->summery}}</td>
            <td><a href="updateFollowup/{{$followup->id}}" class="btn btn-primary" role="button">Edit</a></td>
            <td><a href="delete/{{$followup->id}}" class="btn btn-danger" role="button">Delete</a></td>
        
        </tr>
        @endforeach
        </table>
    </div>
</div>
@endsection