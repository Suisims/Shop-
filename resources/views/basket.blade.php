@extends('layouts.app')

@section('content')
    <script>
        let allcost = 0;
    </script>
    <div class="container">


            @foreach(DB::table('baskets')->where('user_id',Auth::user()->id)->get() as $p)
                    <div class="card" >
                        <div class="card-body">
                            <h5 class="card-title">Name : {{DB::table('products')->find($p->product_id)->name}}</h5>
                            <p class="card-text">'{{DB::table('products')->find($p->product_id)->description}}'</p>
                            <h1>{{DB::table('products')->find($p->product_id)->cost}}$</h1>
                            <img src ="/img/{{DB::table('products')->find($p->product_id)->category}}/{{DB::table('products')->find($p->product_id)->image}}" />
                        </div>
                        <form method="POST" enctype="multipart/form-data" id="delete_product" action="/delete_product/{{$p->id}}">
                            @csrf

                            <button type="submit">
                                Удалить
                            </button>
                        </form>

                    </div>
                <script>
                    allcost += {{DB::table('products')->find($p->product_id)->cost}};
                </script>
            @endforeach
                <form method="POST" enctype="multipart/form-data" id="delete_product" action="/buy">
                    @csrf
                    <button onclick="money()" type="submit" <?php if(count(DB::table('baskets')->where('user_id',Auth::user()->id)->get()) == 0) echo 'hidden';?>>
                        Купить
                    </button>
                </form>

    </div>
    <script>
        function money(){
            alert(allcost + "$");
        }
    </script>
@endsection
