@extends('products.layout')
@section('content')
<div class="row" style="margin-top: 20px;">
    <div class="col-lg-12 margin-tb">
        <div style="text-align: center;">
            <h4>Afficher les information du produit</h4>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Retour</a>
        </div>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="" method="POST" enctype="multipart/form-data" style="margin-top: 20px;">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom du produit:</strong>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail sur produit:</strong>
                <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail" readonly>{{ $product->detail }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prix du produit:</strong>
                <input type="text" class="form-control" name="price" value="{{ $product->price }}" placeholder="Price" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre de produits en stock:</strong>
                <input type="text" class="form-control" name="stock" value="{{ $product->stock }}" placeholder="Stock" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id d'entreprise:</strong>
                <input type="text" class="form-control" name="companyid" value="{{ $product->companyid }}" placeholder="Company id" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image du produit:</strong>
                <br>
                <img src="/images/{{ $product->image }}" width="100px">
            </div>
        </div>
    </div>
</form>
@endsection
