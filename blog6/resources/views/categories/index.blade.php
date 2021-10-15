@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{route('categories.create')}}" class="btn btn-success mb-3">Crear categoría</a>
            <div class="card">
                @if (Session::has('message'))
                    <div class = "alert alert-success">{{Session::get('message')}}</div>
                @endif    
                
                <div class="card-header">Listado de categorías</div>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">nombre</th>
                        <th scope="col">acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                        <td class="d-flex"><a href="{{route('categories.edit', $category->id)}}" class="btn btn-success mr-2">Editar</a>
                            <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Quiere borrar el registro?')">Eliminar</button>
                            </form>
                        </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
