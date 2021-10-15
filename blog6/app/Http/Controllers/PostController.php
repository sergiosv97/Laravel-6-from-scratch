<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Category;
use App\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Session;
use Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::find(Auth::User()->id);
        //dd($user->id);
        $categories = Category::all();
        return view('posts.create',compact('categories','user'));
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
            'title' => 'required',
            'body' => 'required',
            'image' => 'mimes:jpeg,bmp,png,jpg,gif|max:2000',
        ];

        $messages = [
            'title.required' => 'Es obligatorio un titulo para la publicacion',
            'body.required' => 'Es obligatorio un conenido para la publicacion',
            'image.mimes' => 'El archivo debe corresponder a un formato de imagen',
            'image.max' => 'El tamaño de la imagen no debe ser mayor a 2mb.',
        ]; 

        $this->validate($request,$rules,$messages);

        $post = new Post($request->all());
        $post->slug = Str::slug($request->title);
        $post->save();

        if ($request->file('image')) {
            $nombre = Storage::disk('imaposts')->put('imagenes/posts', $request->file('image'));

            $post->fill(['image' => asset($nombre)])->save();
        }

        Session::flash('message','Publicacion creada correctamente');
        return redirect()->route('posts.index');
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
        $post = Post::find($id);
        $categories = Category::all();
        return view('posts.edit',compact('post','categories'));
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
            'title' => 'required',
            'body' => 'required',
            'image' => 'mimes:jpeg,bmp,png,jpg,gif|max:2000',
        ];

        $messages = [
            'title.required' => 'Es obligatorio un titulo para la publicacion',
            'body.required' => 'Es obligatorio un conenido para la publicacion',
            'image.mimes' => 'El archivo debe corresponder a un formato de imagen',
            'image.max' => 'El tamaño de la imagen no debe ser mayor a 2mb.',
        ]; 

        $this->validate($request,$rules,$messages);

        $post = new Post($request->all());
        $post->slug = Str::slug($request->title);
        $post->update($request->all());

        if ($request->file('image')) {
            $nombre = Storage::disk('imaposts')->put('imagenes/posts', $request->file('image'));
            $post->fill(['image' => asset($nombre)])->save();
        }

        Session::flash('message','Publicacion actualizada correctamente');
        return redirect()->route('posts.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
