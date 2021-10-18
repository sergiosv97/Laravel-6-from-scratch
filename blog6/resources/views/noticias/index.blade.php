@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{route('noticias.create')}}" class="btn btn-success mb-3">Ingresar noticia</a>
            <div class="card">
                @if (Session::has('message'))
                    <div class = "alert alert-success">{{Session::get('message')}}</div>
                @endif    
                
                <div class="card-header">Lista de noticias</div>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">IdNoticia</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Texto</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($noticias as $noticia)
                        <tr>
                        <th scope="row">{{$noticia->id}}</th>
                        <td>{{$noticia->titulo}}</td>
                        <td>{{$noticia->texto}}</td>
                        <td><img src="{{$noticia->imagen}}" width="40" height="40" class="img-fluid"></td>
                        <td class="d-flex"><a href="{{route('noticias.edit', $noticia->id)}}" class="btn btn-success mr-2">Editar</a>
                            <form action="{{route('noticias.destroy',$noticia->id)}}" method="POST">
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
