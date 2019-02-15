@extends('layouts.master')

@section('content')

<div class="container">
    <form action="{{route('admin.update', $product->id)}}" method="post" enctype="multipart/form-data">
    {{csrf_field() }}
    {{method_field('PUT')}}
        <div class="row">
            <div class="col">
                <label for="title">Titre</label>
                <input type="text" name="title"  value="{{$product->title}}" id="title" class="form-control">
                @if($errors->has('title'))<span class="error bg-warning">{{$errors->first('title')}}</span>@endif
            </div>

            <div class="col">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="status">Statut</label>
                        <div class="col-md-4">
                            <div class="radio">
                                <label for="status">
                                <input type="radio" @if(old('status')=='Publié') checked @endif name="status" value="Publié" checked> Publier
                                </label>
                            </div>
                            <div class="radio">
                                <label for="radios-1">
                                <input type="radio" @if(old('status')=='Brouillon') checked @endif name="status" value="Brouillon" > Brouillon
                                </label>
                            </div>
                        </div>
                </div>                                                        
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="description">Description</label>
                <textarea type="text" name="description"class="form-control">{{$product->description}}</textarea>
                @if($errors->has('description')) <span class="error bg-warning">{{$errors->first('description')}}</span> @endif
            </div>
            <div class="col-md-6">
                <label for="code">Code du Produit</label>
                    <select id="code" name="code" class="form-control" >
                        <option value="">{{$product->code}}</option>    
                        <option>New</option>
                        <option>Solde</option>
                    </select>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
            <label for="price">Prix</label>
            <input type="text" class="form-control" name="price" value="{{$product->price}}">
            @if($errors->has('price')) <span class="error bg-warning">{{$errors->first('price')}}</span> @endif
            </div>

            <div class="col">
            <label for="reference">Reference Produit</label>
            <input type="text" name="reference" class="form-control" value="{{$product->reference}}">
            @if($errors->has('reference')) <span class="error bg-warning">{{$errors->first('reference')}}</span> @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
            <label for="category_id">Categorie</label>
                <select class="form-control" id="category_id" name="category_id">
                    <option value="">{{$product->category_id}}</option> 
                    @foreach($categories as $id => $title)
                    <option value="{{$id}}">{{$title}}</option>
                    @endforeach
                </select>
            @if($errors->has('category_id')) <span class="error bg-warning">{{$errors->first('category_id')}}</span> @endif
            </div>

        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="size">Taille</label>
                    <select class="form-control" id="size" name="size">
                        <option value="">{{$product->size}}</option>
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
                @if($errors->has('size')) <span class="error bg-warning">{{$errors->first('size')}}</span> @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">        
                    <label for="url_image">Image</label>
                    <input type="file" class="form-control-file" name="url_image" width="200px">
                    @if($errors->has('url_image')) <span class="error bg-warning">{{$errors->first('url_image')}}</span> @endif
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </div>
        </form>
    </div>
    @endsection