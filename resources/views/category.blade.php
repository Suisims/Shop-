@extends('layouts.app')

@section('content')
    <div class="container">
    <?php for($i = 0; $i < count($results);$i++){
        echo '<div class="card" >
                    <div class="card-body">
                        <h5 class="card-title">Name : '.$results[$i]->name.'</h5>
                        <p class="card-text">'.$results[$i]->description.'</p>
                        <h1>'.$results[$i]->cost.'$</h1>
                        <img src ="/img/'.$results[$i]->category.'/'.$results[$i]->image.'" />
                        <a href="../product/'.$results[$i]->id.'" class="card-link">Перейти к товару</a>
                    </div>
                </div>
            ';

};
    ?>
@endsection
