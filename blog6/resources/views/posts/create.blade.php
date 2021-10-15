@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear publicación</div>
                    <form action="{{route('posts.store')}}" method="post" class="m-2" enctype="multipart/form-data">
                        @method('post')
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                            <div class="form-group">
                                <label class="form-control-label">Categorias</label>
                                <select class="form-control" name="category_id">

                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Título de la publicación</label>
                                <input type="text" class="form-control form-control-alternative" placeholder="" value="{{old('title')}}"
                                name="title">

                                @if($errors->has('title'))
                                <strong class="text-danger">{{$errors->first('title')}}</strong>
                                @endif 
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Contenido</label>
                                <textarea class="form-control" rows="3" name="body">{{old('body')}}</textarea>

                                @if($errors->has('body'))
                                <strong class="text-danger">{{$errors->first('body')}}</strong>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Portada</label>
                                <input type="file" class="form-control form-control-alternative" placeholder="" value=""
                                name="image">

                                @if($errors->has('image'))
                                <strong class="text-danger">{{$errors->first('image')}}</strong>
                                @endif 
                                
                            </div>
                       
                        <button type="submit" class="btn btn-primary my-4">Crear</button>
                    </form>
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection
