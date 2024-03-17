@extends('layouts.client')
@section('title')
   {{$title}}
@endsection

{{-- @section('sidebar')
@parent
    <h3>Product Sidebar</h3>
@endsection --}}

@section('content')
@if (session('msg'))
    <div class="alert alert-success">{{session('msg')}}</div>
@endif
    <h1>Product</h1>
    <p>Content</p>
    @push('scripts')
        <script>
        console.log('Second time')
    </script>
    @endpush
@endsection

@section('css')
         
@endsection

@section('js')
    
@endsection
    
@prepend('scripts')
    <script>
        console.log('First time')
    </script>
@endprepend