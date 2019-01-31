<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entregador;

class EntregadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EntregadorResource::collection(Entregador::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entregador = new Entregador;
        $entregador->nome = $request->nome;
        $entregador->qtdDeEntrega = $request->qtdDeEntrega;
        $entregador->pessoaCliente = $request->pessoaCliente;
        $entregador->horarioDeSaida = $request->horarioDeSaida;
        $entregador->horarioDeChegada = $request->horarioDeChegada;
        $entregador->save();
        return response()->json([$entregador]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entregador = Entregador:: findOrFail($id);
        return response()->json([$entregador]);
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
        $entregador = Entregador::findOrFail($id);
        if($request->nome)
            $entregador->nome = $request->nome;
        if($request->qtdDeEntrega)
            $entregador->qtdDeEntrega = $request->qtdDeEntrega;
        if($request->pessoaCliente)
            $entregador->pessoaCliente = $request->pessoaCliente;
        if($request->endereco)
            $entregador->horarioDeSaida = $request->horarioDeSaida;
        if($request->horarioDeChegada)
            $entregador->horarioDeChegada = $request->horarioDeChegada;
        $entregador->save();
        return response()->json([$entregador]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Entregador::destroy($id);
        return response()->json(['Deletado!']);
    }
}
