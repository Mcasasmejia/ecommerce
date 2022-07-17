@extends('layouts.front')

@section('title', "Escribir reseña")

@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($verified_purchase->count() > 0)
                    <h5>Estas escribiendo una reseña para {{ $product->name }}</h5>
                    <form action="{{ url('/add-review') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <textarea class="form-control" name="user_review" rows="5" placeholder="Escribir reseña"></textarea>
                        <button type="submit" class="btn btn-primary mt-3">Enviar reseña</button>
                    </form>
                    @else
                    <div class="alert alert-danger">
                        <h5>No eres elegible para opinar sobre este producto. </h5>
                        <p>
                            Para la confiabilidad de las reseñas, solo los clientes que compraron el producto puede escribir una reseña sobre el producto.
                        </p>
                        <a href="{{ url('/') }}" class="btn btn-primary mt-3">Ir al inicio</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
    
