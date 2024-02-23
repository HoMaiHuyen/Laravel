<h1>Unicode Home Page</h1>
<h2>{{!empty(request()->keyword)?request()->keyword:'No problem'}}</h2>
<div class="container">
    {!! !empty($content)?$content:false !!};
</div>
<hr>

<!-- @switch($number)
    @case(1)
    @case(3)
    @case(5)
        <p>number 1</p>
        @break
    @case(2)
        <p>number 2</p>
        @break
    @default
        <p>The other number</p>
@endswitch -->


@for($i =1; $i<=10; $i++)
    
    @if($i==5)
        @continue
    @endif
    <p>Phần tử thứ: {{$i}}</p>
@endfor