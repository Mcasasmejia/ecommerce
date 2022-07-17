@extends('layouts.front')

@section('title')
    Mi WhishList
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning borde-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a> /
                <a href="{{ url('cart') }}">
                    Cart
                </a> /
            </h6>
        </div>
    </div>

    <div class="container my-5">
        <div class="card shadow">
            <div class="card-body">
                @if ($wishlist->count() > 0)
                    @php $total = 0; @endphp
                    @foreach ($wishlist as $item)
                    <div class="row product_data">
                        <div class="col-md-2 my-auto">
                            <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" height="70px" width="70px" alt="Imagen aqui">
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6>{{ $item->products->name }}</h6>
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6>COP {{ $item->products->selling_price }}</h6>
                        </div>
                        <div class="col-md-2 my-auto">
                            <input type="hidden" class="prod_id" value=" {{ $item->prod_id }} ">
                            @if ( $item->products->qty >= $item->prod_qty)
                            <h6>En stock</h6>
                            <div class="input-group text-center mb-3" style="width: 130px;">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity" class="form-control qty-input text-center" value="1">
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                        @else
                        <h6>Sin Stock</h6>
                        @endif
                        </div>
                        <div class="col-md-2 my-auto">
                            
                            <button type="button" class="btn btn-success addToCartBtn"><i class="fa fa-shopping-cart"></i> Agregar al carrito</button>
                        </div>
                        <div class="col-md-2 my-auto">
                            <button type="button" class="btn btn-danger remove-wishlist-item"><i class="fa fa-trash"></i> Quitar</button>
                        </div>
                    </div>
                    @endforeach
                @else
                <h4>No se encuentran productos en tu Wishlist</h4>
                @endif
            </div>
        </div>
    </div>
@endsection
