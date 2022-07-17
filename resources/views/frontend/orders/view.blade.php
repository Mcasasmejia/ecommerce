@extends('layouts.front')

@section('title')
    Vista de pedidos
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white"> Vista de pedidos
                    <a href=" {{ url('my-orders') }} " class="btn btn-warning text-white float-end">Volver</a>
                </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 order-details">
                            <h4>Detalles de envio</h4>
                            <hr>
                            <label for="">Nombre</label>
                            <div class="border"> {{ $orders->fname }} </div>
                            <label for="">Apellido</label>
                            <div class="border"> {{ $orders->lname }} </div>
                            <label for="">Email</label>
                            <div class="border"> {{ $orders->email }} </div>
                            <label for="">Numero de contacto</label>
                            <div class="border"> {{ $orders->phone }} </div>
                            <label for="">Dirección de envio</label>
                            <div class="border">
                                {{ $orders->address1 }}, <br>
                                {{ $orders->address2 }}, <br>
                                {{ $orders->city }},
                                {{ $orders->state }},
                                {{ $orders->country }} 
                            </div>
                            <label for="">Zip Code</label>
                            <div class="border p-2"> {{ $orders->pincode }} </div>
                        </div>
                        <div class="col-md-6">
                            <h4>Detalles de orden</h4>
                            <hr>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Imagen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders->orderitems as $item)
                                    <tr>
                                        <td> {{ $item->products->name }} </td>
                                        <td> {{ $item->qty }} </td>
                                        <td> {{ $item->price }} </td>
                                        <td>
                                            <img src=" {{ asset('assets/uploads/products/'.$item->products->image) }} " width="50px" alt="Imagen producto">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h4 class="px-2">Total: <span class="float-end">{{ $orders->total_price }} </span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection