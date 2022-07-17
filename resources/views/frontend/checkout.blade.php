@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning borde-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('/') }}">
                Home
            </a> / 
            <a href="{{ url('checkout') }}">
                Checkout
            </a> /
        </h6>
    </div>
</div>

<div class="container mt-3">
    <form action=" {{ url('place-order') }} " method="POST">
        {{ csrf_field() }}
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6>Detalles</h6>
                    <hr>
                    <div class="row checkout-form">
                        <div class="col-md-6">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="fname" placeholder="Ingresar nombre">
                        </div>
                        <div class="col-md-6">
                            <label for="">Apellido</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->lname }}" name="lname" placeholder="Ingresar apellido">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Email</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->email }}" name="email" placeholder="Ingresar email">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Numero Telefonico</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->phone }}" name="phone" placeholder="Ingresar numero telefonico">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Dirección 1</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->address1 }}" name="address1" placeholder="Ingresar dirección 1">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Dirección 2</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->address2 }}" name="address2" placeholder="Ingresar dirección 2">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Ciudad</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->city }}" name="city" placeholder="Ingresar ciudad">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">State</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->state }}" name="state" placeholder="Ingresar state">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">País</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->country }}" name="country" placeholder="Ingresar country">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Pin Code</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->pincode }}" name="pincode" placeholder="Ingresar PinCode">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h6>Orden - Detalles</h6>
                    <hr>
                    @if($cartitems->count() > 0)
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach ($cartitems as $item)
                            <tr>
                               @php $total += ($item->products->selling_price * $item->prod_qty) @endphp
                               <td> {{ $item->products->name }}</td>
                               <td> {{ $item->prod_qty }}</td>
                               <td> {{ $item->products->selling_price }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h6 class="px-2">Total: <span class="float-end">COP {{ $total }}</span></h6>
                    <hr>
                    <button type="submit" class="btn btn-success w-100">Realizar pedido</button>
                    <button type="submit" class="btn btn-primary w-100 mt-3 michpay_btn">Pagar por Michpay</button>
                    @else
                    <h4 class="text-center">No hay productos</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>
</div>

@endsection