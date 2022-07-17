@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Categorias</h1>
                <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                    <tr>
                        <td>{{ $item->id}}</td>
                        <td>{{ $item->name}}</td>
                        <td>{{ $item->description}}</td>
                        <td>
                            <img src="{{ asset('assets/uploads/category/'.$item->image) }}" class="cate-image" alt="Imagen aqui">
                        </td>
                        <td>
                            <a href="{{ url('edit-category/'.$item->id)}}" class="btn btn-info">Editar</a>
                            <a href="{{ url('delete-category/'.$item->id)}}" class="btn btn-danger">Eliminar</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
@endsection