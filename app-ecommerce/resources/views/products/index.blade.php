@extends('products.layout')
@section('content')
<div class="row" style="margin-top: 20px;">
    <div class="col-lg-12 margin-tb">
        <div style="text-align: center;">
            <h4>Gestion de produits</h4>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('products.create') }}">
                Ajouter nouveau produit
            </a>
        </div>
    </div>
</div>
<br>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered" style="margin-top: 20px;">
    <tr>
        <th>Numéro</th>
        <th>Image</th>
        <th>Nom produit</th>
        <th>Details</th>
        <th>prix</th>
        <th>stock</th>
        <th>id d'entreprise</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td><img src="/images/{{ $product->image }}" width="100px"></td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->detail }}</td>
        <td>{{ $product->price }} dh</td>
        <td>{{ $product->stock }}</td>
        <td>{{ $product->companyid }}</td>
        <td style="width: 300px;">
            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('products.show', $product->id) }}">Afficher</a>
                <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Modifier</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{!! $products->links() !!}
<div class="search mt-5">
    <h3>Filtrage de produits</h3>
    <form action="{{ route('products.index') }}" method="GET" class="row g-3">
        <div class="col-sm-12 col-md-3">
            <input type="text" name="search" class="form-control" placeholder="chercher par mot clé" value="{{ request('search') }}">
        </div>
        <div class="col-sm-12 col-md-2">
            <input type="number" name="min_price" class="form-control" placeholder="prix min" value="{{ request('min_price') }}">
        </div>
        <div class="col-sm-12 col-md-2">
            <input type="number" name="max_price" class="form-control" placeholder="prix max" value="{{ request('max_price') }}">
        </div>
        <div class="col-sm-12 col-md-2">
            <input type="number" name="min_stock" class="form-control" placeholder="stock min" value="{{ request('min_stock') }}">
        </div>
        <div class="col-sm-12 col-md-2">
            <input type="number" name="max_stock" class="form-control" placeholder="stock max" value="{{ request('max_stock') }}">
        </div>
        <div class="col-sm-12 col-md-1">
            <button class="btn btn-warning" type="submit">Search</button>
        </div>
    </form>
</div>
<a href="{{ route('products.index') }}" class="btn btn-success mt-3">Retour à la liste de products</a>
@endsection