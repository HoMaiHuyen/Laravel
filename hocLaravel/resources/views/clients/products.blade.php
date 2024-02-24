@extends('layouts.client')
@section('title')
   {{$title}}
@endsection

@section('sidebar')
@parent
    <h3>Product Sidebar</h3>
@endsection

@section('content')
    <h1>Product</h1>
@endsection

@section('css')
         
@endsection

{{-- @section('js')
    <script>
        document.querySelector('.show').onclick = function(){
        alert('Successful');
    }
    </script>
@endsection --}}