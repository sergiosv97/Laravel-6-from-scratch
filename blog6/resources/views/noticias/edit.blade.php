@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar noticia</div>
                @if (Session::has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                         {{Session::get('message')}}
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                @endif

                <div class="col-xl-8 order-xl-2 mb-5 mb-xl-0">
                    <div class="card-body m-4">
                        <form action="{{route('noticias.update', $noticia->id)}}" method="post" class="m-2" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                                <div class="form-group">
                                    <label class="form-control-label">Título</label>
                                    <input type="text" id="titulo" class="form-control form-control-alternative" placeholder="" value="{{$noticia->titulo}}"
                                    name="titulo">
    
                                    @if($errors->has('titulo'))
                                    <strong class="text-danger">{{$errors->first('titulo')}}</strong>
                                    @endif 
                                </div>
    
                                <div class="form-group">
                                    <label class="form-control-label" for="competencias">Texto</label>
                                    <textarea class="form-control" id="mymce" rows="3" name="texto">{{$noticia->texto}}</textarea>
    
                                    @if($errors->has('texto'))
                                    <strong class="text-danger">{{$errors->first('texto')}}</strong>
                                    @endif
                                </div>

                                <img src="{{$noticia->imagen}}" class="img-fluid" width="200" alt=""> 
    
                                <div class="form-group">
                                    <label class="form-control-label" for="competencias">Imagen</label>
                                    <input type="file" class="form-control form-control-alternative" placeholder="" value="{{$noticia->imagen}}"
                                    name="imagen">
    
                                    @if($errors->has('imagen'))
                                    <strong class="text-danger">{{$errors->first('imagen')}}</strong>
                                    @endif 
                                    
                                </div>
                           
                            <button type="submit" class="btn btn-primary my-4">Actualizar</button>
                        </form>
                    </div>
                </div>
                    
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection
