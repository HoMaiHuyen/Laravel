@extends('layouts.client')
@section('title')
   {{$title}}
@endsection

@section('content')
@if (session('msg'))
    <div class="alert alert-success">{{session('msg')}}</div>
@endif
    <h1>{{$title}}</h1>
    <table class="table table-bordered">
        <thead>
            
            <tr>
                <th width="5%">STT</th>
                <th>Name</th>
                <th>Email</th>
                <th width = "10%">Time</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($users))
            @foreach ($users as $key => $item)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$item->fullname}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->created_at}}</td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="4">No user</td>
            </tr>
            @endif
        </tbody>
    </table>
@endsection