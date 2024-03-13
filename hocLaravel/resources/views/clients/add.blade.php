@extends('layouts.client')
@section('title')
   {{$title}}
@endsection

@section('content')
    <h1>Add Product</h1>
    <form action="{{route('post-add')}}" method="POST" id="product-form">
        
            <div class="arlert alert-danger text-center msg" style="display: none"></div>
        
        <div class="mb-3">
            <label for="">Product name</label>
            <input type="text" class="form-control" name="product_name" placeholder="Product name..." value="{{old('product_name')}}">
            <span style="color: red" class="error product_name_error"></span> 
        </div>
        <div class="mb-3">
            <label for="">Price</label>
            <input type="text" class="form-control" name="product_price" placeholder="Product price..." value="{{old('product_price')}}">
            <span style="color: red" class="error product_price_error"></span>
        </div>
        <button type="submit" class="btn btn-primary">Create new product</button>
        @csrf
    </form>
@endsection

@section('css')
    
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('#product-form').on('submit', function(e){
            e.preventDefault();
            let productName = $('input[name="product_name"]').val().trim();
            let productPrice = $('input[name="product_price"]').val().trim();
            let actionUrl = $(this).attr('action');
            let csrfToken = $(this).find('input[name="_token"]').val(); // Thay đổi biến csfToken thành csrfToken
            console.log(csrfToken);
            $('error').text('');
            $.ajax({
                url: actionUrl,
                type: 'POST',
                data: {
                    product_name: productName,
                    product_price: productPrice,
                    _token: csrfToken // Thêm giá trị của csrfToken vào đây
                },
                dataType: 'json',
                success: function(response){
                    console.log(response);
                },
                error: function(error){
                    $('msg').show();
                    let responseJSON = error.responseJSON.errors;
                    if(Object.keys(responseJSON).length>0){
                        $('msg').text(responseJSON.msg);
                        for (let key in responseJSON) {
                        $('#' + key + '_error').text(responseJSON[key][0]);
                    }
                    }
                }
            });
        });
    });
</script>
@endsection