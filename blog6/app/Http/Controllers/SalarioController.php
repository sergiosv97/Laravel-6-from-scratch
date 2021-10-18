<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salario;
use App\User;
use Auth;
use Session;
use Redirect;

class SalarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$salarios = Salario::all();
        //return view('salarios.index',compact('salarios'));

        $rol = auth()->user()->rol;
        if($rol == "administrador"){
            $salarios = Salario::paginate(5);
            return view('salarios.index',compact('salarios'));
        }
        else{
            $cedula = auth()->user()->cedula;
            $salarios = Salario::where('cedula',$cedula)->paginate(5);
            return view('salarios.index',compact('salarios'));
        }
        
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
        return view('salarios.create',compact('user'));
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
            'salario' => 'required',
            'fecha' => 'required',
            'cedula' => 'required',
        ];

        $messages = [
            'salario.required' => 'Es obligatorio un monto de salario',
            'fecha.required' => 'Es obligatorio una fecha de pago de salario',
            'cedula.required' => 'Es obligatorio incluir un numero de cedula',
        ]; 

        $this->validate($request,$rules,$messages);

        $salario = new Salario($request->all());
        $salario->save();

        Session::flash('message','Salario cargado correctamente');
        return redirect()->route('salarios.index');
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
        //
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
        //
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
