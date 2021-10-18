@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro de salario del empleado</div>
                    <form action="{{route('salarios.store')}}" method="post" class="m-2" enctype="multipart/form-data">
                        @method('post')
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                            <div class="form-group">
                                <label class="form-control-label">Salario</label>
                                <input type="string" class="form-control form-control-alternative" placeholder="" value="{{old('salario')}}"
                                name="salario">

                                @if($errors->has('salario'))
                                <strong class="text-danger">{{$errors->first('salario')}}</strong>
                                @endif 
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Fecha Pago</label>
                                <input type="date" class="form-control form-control-alternative" placeholder="" value="{{old('fecha')}}"
                                name="fecha">

                                @if($errors->has('fecha'))
                                <strong class="text-danger">{{$errors->first('fecha')}}</strong>
                                @endif 
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Cedula del empleado</label>
                                <textarea class="form-control" rows="3" name="cedula">{{old('cedula')}}</textarea>

                                @if($errors->has('cedula'))
                                <strong class="text-danger">{{$errors->first('cedula')}}</strong>
                                @endif
                            </div>
                       
                        <button type="submit" class="btn btn-primary my-4">Registrar salario</button>
                    </form>
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection
