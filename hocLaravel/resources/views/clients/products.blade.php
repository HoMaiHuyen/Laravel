@extends('layouts.client')
@section('title')
   {{$title}}
@endsection

@section('sidebar')
    <h3>Product Sidebar</h3>
@endsection

@section('content')
    <h1>Product</h1>
    <button type="button" class="show">Show</button>
@endsection

@section('css')
    <style>
    header{
        background: red;
        color : #333;
    } 
    </style>      
@endsection

{{-- @section('js')
    <script>
        document.querySelector('.show').onclick = function(){
        alert('Successful');
    }
    </script>
@endsection --}}