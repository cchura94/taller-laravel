<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cliente;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //select nombres, apellidos from clientes
        //return Cliente::select("nombres", "apellidos")->get();

        //select nombres, apellidos, correo from clientes where id = 2
        //return Cliente::select("nombres", "apellidos", "correo")->where('id', "=", 2)->get();

        //select nombres, apellidos from clientes where nombres like '%Os%'
        //return Cliente::select("nombres", "apellidos")->where('nombres', "like", "%Os%")->get();
        
        //select nombres, apellidos from clientes where nombres = 'pedro' and apellidos = 'prueba'
        //return Cliente::select("nombres", "apellidos")->where('nombres', "pedro")->where('apellidos', "prueba")->get();

        // contar todos los registros de la tabla clientes
        //return Cliente::count();

        // listar todos los clientes ordenado por apellidos ascendente
        //return Cliente::orderBy("apellidos", "asc")->get();

        /*return Cliente::get()->groupBy(function($fila){
            return $fila;
        })*/

        $cliente_con_pedidos = Cliente::find(2);
        $cliente_con_pedidos->pedidos;

        return $cliente_con_pedidos;
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente;
        $cliente->nombres = $request->nombres;
        $cliente->apellidos = $request->apellidos;
        $cliente->correo = $request->correo;
        $cliente->ci_nit = $request->ci_nit;
        $cliente->telefono = $request->telefono;
        $cliente->save();

        return "Cliente registrado";
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->pedidos;
        return $cliente;
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
        //return $request;
        //
        $cliente = Cliente::findOrFail($id);
        $cliente->nombres = $request->nombres;
        $cliente->apellidos = $request->apellidos;
        $cliente->correo = $request->correo;
        $cliente->ci_nit = $request->ci_nit;
        $cliente->telefono = $request->telefono;
        $cliente->save();

        return "Cliente modificado";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return "Cliente eliminado";
        
    }
}
