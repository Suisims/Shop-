@extends('layouts.app')

@section('content')
    <div class="card" >
        <div class="card-body">
            <h5 class="card-title">Name : {{$results->name}}</h5>
            <p class="card-text">{{$results->description}}</p>
            <h1>{{$results->cost}}</h1>
            <img src ="/img/{{$results->category}}/{{$results->image}}" />
            <form enctype="multipart/form-data" id="add_product" >
                @csrf
                <input value="{{$results->id}}" name="product_id" id="add_product" hidden>
                <button class="btn" value="buy">Добавить в корзину</button>
            </form>
        </div>
    </div>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#add_product').submit(function(e) {
        e.preventDefault();
        $.ajax({
            method: 'POST',
            url: '/add_product',

            data: new FormData(this),
            dataType:'Json',
            contentType:false,
            processData:false,
            success: function(arg) {
                alert('Товар успешно добавлен');
                window.location.replace("../");
            }
        })
    });
</script>
@endsection
