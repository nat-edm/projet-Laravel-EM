@extends('layouts.master')

@section('content')

<!-- rajoute le fil d'ariane -->


<div class="row">
<!-- rajoute images complémentaires -->
    <div class="col-sm-2 text-center">
            <a href="#"><img class="image_suppl" src="{{asset('images/'.$product->url_image)}}" alt="{{$product->url_image}}" width="120"></a></li>
            <a href="#"><img class="image_suppl" src="{{asset('images/'.$product->url_image)}}" alt="{{$product->url_image}}" width="120"></a></li>
            <a href="#"><img class="image_suppl" src="{{asset('images/'.$product->url_image)}}" alt="{{$product->url_image}}" width="120"></a></li>
    </div>

<!-- rajoute la grande image centrée -->
    <div class="col-sm-7 text-center">
        <img width="450" src="{{asset('images/'.$product->url_image)}}" alt="{{$product->url_image}}">
    </div>

<!-- rajoute les infos produit -->
    <div class="col-sm-3">
        <p>
            {{$product->title}} <br>
            réf : {{$product->reference}} <br>
            {{$product->price}} euros <br>
        </p>
        <!-- rajoute la liste déroulante des tailles -->
        <select id="size">
            <option value="">Votre taille</option>
            <option value="36">36</option>
            <option value="38">38</option>
            <option value="40">40</option>
            <option value="42">42</option>
            <option value="44">44</option>
            <option value="46">46</option>
            <option value="48">48</option>
            <option value="50">50</option>
            <option value="52">52</option>
        </select>
    </div>

</div>

<!-- rajoute la description produit -->
<div class="row col-sm">
    <p>
        <strong>Description :</strong> <br>
        {{$product->description}}  
    </p>
</div>

@endsection