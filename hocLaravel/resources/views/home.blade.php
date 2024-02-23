<h1>Unicode Home Page</h1>
<h2>{{!empty(request()->keyword)?request()->keyword:'No problem'}}</h2>
<div class="container">
    {!! !empty($content)?$content:false !!}
</div>
<hr>
@php
$message = 'Order successful';
@endphp
@include('path.notice');

 {{-- @php
$number = 10;
$total = $number +20;
@endphp
<h3>Answer: {{$number}} - {{$total}}</h3>

@for($index = 0; $index<=10; $index++)
<p>Phần tử: {{$index}}</p>
@endfor --}}

 {{-- @php
    // for ($index = 0; $index<10; $index++)
    //     echo '<p>Phần tử: '.$index.'</p>'

@endphp
@verbatim
<div class="container">
    Hello, {{className}}
</div>
<script>
    Hello, {{name}}
    Hi, {{age}}
</script>
@endverbatim --}}

