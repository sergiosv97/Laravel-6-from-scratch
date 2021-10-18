@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{route('salarios.create')}}" class="btn btn-success mb-3">Cargar salario</a>
            <div class="card">
                @if (Session::has('message'))
                    <div class = "alert alert-success">{{Session::get('message')}}</div>
                @endif    
                
                <div class="card-header">Lista de salarios</div>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Salario</th>
                        <th scope="col">Fecha pago</th>
                        <th scope="col">Cedula del empleado</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($salarios as $salario)
                        <tr>
                        <th scope="row">{{$salario->id}}</th>
                        <td>{{$salario->salario}}</td>
                        <td>{{$salario->fecha}}</td>
                        <td>{{$salario->cedula}}</td>
                        <td class="d-flex"><a href="{{route('salarios.edit', $salario->id)}}" class="btn btn-success mr-2">Editar</a>
                            <form action="{{route('salarios.destroy',$salario->id)}}" method="POST">
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
