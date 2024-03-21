@extends('layouts.client')
@section('title')
   {{$title}}
@endsection

@section('content')
@if (session('msg'))
    <div class="alert alert-success">{{session('msg')}}</div>
@endif
    <h1>{{$title}}</h1>
    <a href="{{route('users.add')}}" class="btn btn-primary">Add user</a>
    <hr />
    <table class="table table-bordered">
        <thead>
            
            <tr>
                <th width="5%">STT</th>
                <th>Name</th>
                <th>Email</th>
                <th width = "15%">Time</th>
                <th width="5%">Update</th>
                <th width="5%">Delete</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($usersList))
            @foreach ($usersList as $key => $item)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$item->fullname}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->created_at}}</td>
                <td>
                    <a href="{{ route('users.edit', ['id' => $item->id]) }}" class="btn btn-warning btn-sm">Update</a>
                </td>
                <td>
                    <a  onclick="return confirm('Are you sure to delete?')" href="{{route('users.delete', ['id'=>$item->id])}}" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6">No user</td>
            </tr>
            @endif
        </tbody>
    </table>
@endsection