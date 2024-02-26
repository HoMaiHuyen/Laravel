<h2>Demo Unicode</h2>
@if (session('message'))
    <div class="alert alert-succes">
        {{session('message')}}
    </div>
@endif
<form action="" method="POST">
    <input type="text" name="username" placeholder="Username..." value="{{old('username')}}"/>
    <button type="submit">Submit</button>
    @csrf
</form>