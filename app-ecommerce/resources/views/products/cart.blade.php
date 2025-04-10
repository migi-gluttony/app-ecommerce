<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Products</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <style>
        .products {
            margin-top: 20px;
        }
        .caption {
            text-align: center;
        }
        .img-size {
            width: 225px !important;
            height: 153px;
            margin-left: 20px;
            margin-top: 10px;
        }
        .cart-delete {
            margin-left: 5px;
            text-decoration: none;
            color: grey;
            font-size: 16px;
            margin-top: 5px;
            cursor: pointer;
        }
        .cart-delete:hover {
            color: red;
        }
        .check-btn {
            float: right;
        }
        .shopping-btn {
            background: #fcfcfc;
            border: 1px solid #7c7e81 !important;
        }
    </style>
</head>
<body>
    @extends('layout2')
    @section('title', 'Products')
    @section('content')
    <table id="cart" class="table table-bordered table-hover table-condensed mt-3">
        <thead>
            <tr>
                <th style="width:50%">Produit</th>
                <th style="width:8%">Quantité</th>
                <th style="width:22%" class="text-center">Sous-total</th>
                <th style="width:10%" class="text-center">Prix unitaire</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0 ?>
            @if(session('cart'))
            @foreach(session('cart') as $id => $details)
            <?php $total += $details['price'] * $details['quantity'] ?>
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs">
                            <img src="/images/{{ $details['photo'] }}" width="50" height="" class="img-responsive" />
                        </div>
                        <div class="col-sm-9">
                            <p class="nomargin">{{ $details['name'] }}</p>
                            <p class="remove-from-cart cart-delete" data-id="{{ $id }}" title="Delete">Supprimer</p>
                        </div>
                    </div>
                </td>
                <td data-th="Quantity">
                    <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                </td>
                <td data-th="Subtotal" id="subtotalcal" class="text-center">{{ $details['price'] * $details['quantity'] }} dh </td>
                <td data-th="prixunitaire" id="prixunitaire">{{ $details['price'] }} dh</td>
            </tr>
            @endforeach
            @endif
        </tbody>
        <tfoot>
            @if(!empty($details))
            <tr class="visible-xs">
                <td class="text-right" colspan="2"><strong>Total</strong></td>
                <td class="text-center" id="totalprixachats"> {{ $total }} dh</td>
            </tr>
            @else
            <tr>
                <td class="text-center" colspan="3">Votre panier est vide.....</td>
            </tr>
            @endif
        </tfoot>
    </table>
    <a href="{{ url('/') }}" class="btn shopping-btn">Continuer les achats</a>
    <a href="" class="btn btn-warning check-btn">Procéder au paiement</a>
    <div class="container products">
        <div class="row">
            @foreach($products as $product)
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="card mb-4">
                    <img src="/images/{{ $product->image }}" class="card-img-top img-size" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit(strtolower($product->detail), 50) }}</p>
                        <p class="card-text"><strong>Prix: </strong> {{ $product->price }}</p>
                        <a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-warning btn-block text-center" role="button">Ajouter au panier</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endsection
    @section('scripts')
    <script type="text/javascript">
        $(".remove-from-cart").click(function(e) {
            e.preventDefault();
            var ele = $(this);
            if (confirm("Are you sure want to remove product from the cart.")) {
                $.ajax({
                    url: '{{ url("remove-from-cart") }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
        $("#id123").change(function(e) {
            $("#abcd12").value = 3;
        });
        $(':input[type="number"]').on('input', updateTotal);
        function updateTotal(e) {
            var numberprods = parseInt(e.target.value.split(' ')[0]);
            if (!numberprods || numberprods < 0) return;
            var $parentRow = $(e.target).parent().parent();
            var prixu = parseInt($parentRow.find('#prixunitaire').text());
            var sousprixtotal = (numberprods * prixu);
            $parentRow.find('#subtotalcal').text(sousprixtotal + ' dh');
            var prixtotal = parseInt($parentRow.parent().parent().find('#totalprixachats').text().split(' ')[0]) - ((numberprods - 1) * prixu) + sousprixtotal;
            $parentRow.parent().parent().find('#totalprixachats').text(prixtotal + ' dh');
        }
    </script>
    @endsection
</body>
</html>