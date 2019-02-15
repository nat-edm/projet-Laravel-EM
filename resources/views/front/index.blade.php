@extends('layouts.master')

@section('content')

<!-- rajoute la pagination -->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        {{$products->links()}} 
    </ul>
</nav>

<!-- rajoute le nombre de résultats -->
<p class="text-right">
    {{$category->title?? ''}}
    {{$nbproducts}} résultats
</p>

<!-- rajoute les images et infos produits -->    
<div class="d-flex flex-row flex-wrap justify-content-between">

    @foreach($products as $product)

    <div class="p-2 text-center">
        <a href="{{url('product', $product->id)}}" class="thumbnail">
            <img src="{{asset('images/'.$product->url_image)}}" alt="{{$product->url_image}}">
        </a>
        <p>
            <a href="{{url('product', $product->id)}}">{{$product->title}}</a> <br>
            {{$product->price}} euros
        </p>
    </div>

    @endforeach

</div>  

<!-- rajoute la pagination -->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        {{$products->links()}} 
    </ul>
</nav>

@endsection
