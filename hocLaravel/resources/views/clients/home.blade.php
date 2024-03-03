@extends('layouts.client')
@section('title')
   {{$title}}
@endsection

@section('sidebar')
@parent
    <h3>Home Sidebar</h3>
@endsection

@section('content')
@if (session('msg'))
    <div class="alert alert-{{session('type')}}">
        {{session('msg')}}
    </div>
@endif
    <h1>Home Page</h1>
    @datetime('2024-12-15 17:54:40')
    @include('clients.contents.slide')
    @include('clients.contents.about')

    @env('production')
        <p>Production inviroment</p>
    @elseenv('test')
        <p>Not test inviroment</p>
    @else
        <p>Dev inviroment</p>
    @endenv

    {{-- <x-alert type="success" /> --}}
    
    <x-alert type="info" :content="$message" data-icon="Youtube" />
    {{-- <x-inputs.button />

    <x-forms.button /> --}}

    <p><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSCpwaSil7uTHp_maqtzGVR4U0yNCs9BsZoug&usqp=CAU" alt="Cat"></p>
    <p><a href="{{ route('download-image') . '?image=' . asset('storage/bao_dom.jpg') }}" class="btn btn-primary">Download</a></p>
@endsection

@section('css')
    <style>
        img{
            max-width: 100%;
            height: auto;
        }
    </style>
@endsection

@section('js')

@endsection