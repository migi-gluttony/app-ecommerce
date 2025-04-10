<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>@yield('title')</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<style>
.cart-table {
    float: right;
    margin-top: 20px;
}
.cart-icon {
    color: #000;
    margin-right: 32px;
}
.cart-count {
    background-color: #000;
    color: #fff;
}
</style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12 main-section">
            <div class="cart-table dropdown">
                <a href="{{ url('cart') }}" class="cart-icon">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    Panier <span class="badge badge-pill cart-count">{{ count((array) session('cart')) }}</span>
                </a>
                <a href="{{ url('clear-cart') }}" class="cart-icon"><i class="fa fa-trash-o"></i> Vider le panier</a>
            </div>
        </div>
    </div>
    <div class="container page">
        @yield('content')
    </div>
    @yield('scripts')
</body>
</html>