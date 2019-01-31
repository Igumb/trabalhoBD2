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
        return ClienteResource::collection(Cliente::all());
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
        $cliente->nome = $request->nome;
        $cliente->telefone = $request->telefone;
        $cliente->endereco = $request->endereco;
        $cliente->cartaoDeCredito = $request->cartaoDeCredito;
        $cliente->email = $request->email;
        $cliente->save();
        return response()->json([$cliente]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente:: findOrFail($id);
        return response()->json([$cliente]);
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
        $cliente = Cliente::findOrFail($id);
        if($request->nome)
            $cliente->nome = $request->nome;
        if($request->telefone)
            $cliente->telefone = $request->telefone;
        if($request->endereco)
            $cliente->endereco = $request->endereco;
        if($request->cartaoDeCredito)
            $cliente->cartaoDeCredito = $request->cartaoDeCredito;
        if($request->email)
            $cliente->email = $request->email;
        $cliente->save();
        return response()->json([$cliente]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cliente::destroy($id);
        return response()->json(['Deletado!']);
    }
}
