@extends('layouts.client')
@section('title')
   {{$title}}
@endsection

@section('sidebar')
@parent
    <h3>Home Sidebar</h3>
@endsection

@section('content')
    <h1>Home Page</h1>
    @datetime('2024-12-15 17:54:40')
    @include('clients.contents.slide')
    @include('clients.contents.about')
@endsection

@section('css')
    
@endsection

@section('js')

@endsection