@extends('layouts.client')
@section('title')
   {{$title}}
@endsection

@section('content')
    <h1>Add Product</h1>
    <form action="" method="POST">
        @error('msg')
            <div class="arlert alert-danger text-center">{{$message}}</div>
        @enderror
        {{-- @if ($errors->any())
            <div class="alert alert-danger text-center">
                {{$errorMessage}}
            </div>
        @endif --}}
        <div class="mb-3">
            <label for="">Product name</label>
            <input type="text" class="form-control" name="product_name" placeholder="Product name..." value="{{old('product_name')}}">
            @error('product_name')
               <span style="color: red">{{$message}}</span> 
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Price</label>
            <input type="text" class="form-control" name="product_price" placeholder="Product price..." value="{{old('product_price')}}">
            @error('product_price')
               <span style="color: red">{{$message}}</span> 
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create new product</button>
        @csrf
    </form>
@endsection

@section('css')
    
@endsection

@section('js')

@endsection