<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Session;
use Redirect;
use App\Noticia;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::all();
        return view('noticias.index',compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::find(Auth::User()->id);
        return view('noticias.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //validacion
         $rules = [
            'titulo' => 'required',
            'texto' => 'required',
            'imagen' => 'mimes:jpeg,bmp,png,jpg,gif|max:2000',
        ];

        $messages = [
            'titulo.required' => 'Es obligatorio un titulo para la publicacion',
            'texto.required' => 'Es obligatorio un conenido para la publicacion',
            'imagen.mimes' => 'El archivo debe corresponder a un formato de imagen',
            'imagen.max' => 'El tamaño de la imagen no debe ser mayor a 2mb.',
        ]; 

        $this->validate($request,$rules,$messages);

        $noticia = new Noticia($request->all());
        $noticia->save();

        if ($request->file('imagen')) {
            $nombre = Storage::disk('imaposts')->put('imagenes/noticias', $request->file('imagen'));

            $noticia->fill(['imagen' => asset($nombre)])->save();
        }

        Session::flash('message','Publicacion creada correctamente');
        return redirect()->route('noticias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia = Noticia::find($id);
        return view('noticias.edit',compact('noticia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validacion
        $rules = [
            'titulo' => 'required',
            'texto' => 'required',
            'imagen' => 'mimes:jpeg,bmp,png,jpg,gif|max:2000',
        ];

        $messages = [
            'titulo.required' => 'Es obligatorio un titulo para la publicacion',
            'texto.required' => 'Es obligatorio un conenido para la publicacion',
            'imagen.mimes' => 'El archivo debe corresponder a un formato de imagen',
            'imagen.max' => 'El tamaño de la imagen no debe ser mayor a 2mb.',
        ]; 

        $this->validate($request,$rules,$messages);

        $noticia = new Noticia($request->all());
        $noticia->update($request->all());

        if ($request->file('imagen')) {
            $nombre = Storage::disk('imaposts')->put('imagenes/noticias', $request->file('imagen'));
            $noticia->fill(['imagen' => asset($nombre)])->save();
        }

        Session::flash('message','Noticia actualizada correctamente');
        return redirect()->route('noticias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
