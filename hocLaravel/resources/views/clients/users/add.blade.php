@extends('layouts.client')
@section('title')
   {{$title}}
@endsection

@section('content')
@if (session('msg'))
    <div class="alert alert-success">{{session('msg')}}</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">Invalid data. Check again please</div>
@endif
    <h1>{{$title}}</h1>

    <form action="" method="POST">
        <div class="mb-3">
            <label for="">Fullname</label>
            <input type="text" class="form-control" name="fullname" placeholder="Fullname..." value="{{old('fullname')}}">
            @error('fullname')
                <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Email..." value="{{old('email')}}">
            @error('email')
                <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Group</label>
            <select name="group_id" class="form-control" id="">
                <option value="0">Choose group</option>
                @if (!empty($allGroups))
                    @foreach ($allGroups as $item)
                       <option value="{{$item->id}}" {{old('group_id')==$item->id? 'selected':false}}>{{$item->name}}</option> 
                    @endforeach
                @endif
            </select>
            @error('group_id')
                <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Status</label>
            <select name="status" class="form-control" id="">
                <option value="0" {{old('status')==0? 'selected':false}}>Not activated</option>
                <option value="1" {{old('status')==1? 'selected':false}}>Activated</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add new</button>
        <a href="{{route('users.index')}}" class="btn btn-warning">Turn back</a>
        @csrf
    </form>
@endsection