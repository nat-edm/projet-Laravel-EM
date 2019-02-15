@extends('layouts.master')

@section('content')

@include('back.product.partials.flash')

<!-- rajoute la pagination -->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        {{$products->links()}} 
    </ul>
</nav>

<!-- dashboard -->
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Categorie</th>
            <th>Prix</th>
            <th>Statut</th>
            <th>Mettre à jour</th>
            <th>Supprimer</th>

        </tr>
    </thead>
    <tbody>
    @forelse($products as $product)
        <tr>
            <td>{{$product->title}}</td>
            <td>{{$product->category->title}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->status}}</td>
            <td>
                <a href="{{route('admin.edit', $product->id)}}" ><input class="btn btn-info" type="submit" value="Mettre à jour" ></a>
            </td>
            <td>
                <form class="delete" method="POST" action="{{route('admin.destroy', $product->id)}}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input class="btn btn-danger" type="submit" value="Delete" >
                </form>
            </td>
        </tr>
    @empty
        aucun produit ...
    @endforelse
    </tbody>
</table>

<!-- rajoute la pagination -->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        {{$products->links()}} 
    </ul>
</nav>

@endsection 