@extends('layouts.client')
@section('title')
   {{$title}}
@endsection

{{-- @section('sidebar')
@parent
    <h3>Product Sidebar</h3>
@endsection --}}

@section('content')
    <h1>Product</h1>
    <x-package-alert>Content</x-package-alert>
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