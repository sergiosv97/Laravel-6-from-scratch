@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cargar noticia</div>
                    <form action="{{route('noticias.store')}}" method="post" class="m-2" enctype="multipart/form-data">
                        @method('post')
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->id}}">

                            <div class="form-group">
                                <label class="form-control-label">Título de la noticia</label>
                                <input type="text" class="form-control form-control-alternative" placeholder="" value="{{old('titulo')}}"
                                name="titulo">

                                @if($errors->has('titulo'))
                                <strong class="text-danger">{{$errors->first('titulo')}}</strong>
                                @endif 
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Texto</label>
                                <textarea class="form-control" rows="3" name="texto">{{old('texto')}}</textarea>

                                @if($errors->has('texto'))
                                <strong class="text-danger">{{$errors->first('texto')}}</strong>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Imagen</label>
                                <input type="file" class="form-control form-control-alternative" placeholder="" value=""
                                name="imagen">

                                @if($errors->has('imagen'))
                                <strong class="text-danger">{{$errors->first('imagen')}}</strong>
                                @endif 
                                
                            </div>
                       
                        <button type="submit" class="btn btn-primary my-4">Enviar</button>
                    </form>
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection
