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

    <form action="" method="get" class="mb-3">
        <div class="row">
            
            <div class="col-3">
                <select class="form-control" name="status">
                    <option value="0">All Status</option>
                    <option value="active">{{request()->status=='active'?'selected':false}}Activated</option>
                    <option value="inactive">{{request()->status=='inactive'?'selected':false}}Not activated</option>
                </select>
            </div>
            <div class="col-3">
                <select class="form-control" name="group_id">
                    <option value="0">All groups</option>
                    @if (!empty(getAllGroups()))
                        @foreach (getAllGroups() as $item)
                            <option value="{{$item->id}}" {{request()->group_id==$item->id? 'selected':false}}>{{$item->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-4">
                <input type="search" name="keywords" class="form-control" placeholder="Key word search..." value="{{request()->keywords}}">
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary btn-block">Search</button>
            </div>
        </div>
    </form>
    <table class="table table-bordered">
        <thead>
            
            <tr>
                <th width="5%">STT</th>
                <th>Name</th>
                <th>Email</th>
                <th>Groups</th>
                <th>Status</th>
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
                <td>{{$item->group_name}}</td>
                <td>{!!$item->status==0? '<button class="btn btn-danger">Not activated</button>':'<button class="btn btn-success">Activated</button>'!!}</td>
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