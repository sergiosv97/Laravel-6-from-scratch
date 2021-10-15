@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar categoria</div>
                    <form action="{{route('categories.update',$category->id)}}" method="post" class="m-2">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label" for="name">Editar categoría</label>
                            <input type="text" class="form-control form-control-alternative" name="name" value="{{$category->name}}">
                            @if($errors->has('name'))
                                <strong class="text-danger">{{$errors->first('name')}}</strong>
                            @endif    
                            
                        </div>
                       
                        <button type="submit" class="btn btn-primary my-4">Actualizar</button>
                    </form>
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection
