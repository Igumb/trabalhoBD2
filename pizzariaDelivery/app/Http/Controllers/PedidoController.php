<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PedidoResource::collection(Pedido::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pedido = new Pedido;
        $pedido->sabor = $request->sabor;
        $pedido->bebida = $request->bebida;
        $pedido->tamanho = $request->tamanho;
        $pedido->valor = $request->valor;
        $pedido->formaDePagamento = $request->formaDePagamento;
        $pedido->tempoEstPreparo = $request->tempoEstPreparo;
        $pedido->tempoEstEntrega = $request->tempoEstEntrega;
        $pedido->status = $request->status;
        $pedido->save();
        return response()->json([$pedido]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido:: findOrFail($id);
        return response()->json([$pedido]);
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
        $pedido = Pedido::findOrFail($id);
        if($request->sabor)
            $pedido->sabor = $request->sabor;
        if($request->bebida)
            $pedido->bebida = $request->bebida;
        if($request->tamanho)
            $pedido->tamanho = $request->tamanho;
        if($request->valor)
            $pedido->valor = $request->valor;
        if($request->formaDePagamento)
            $pedido->formaDePagamento = $request->formaDePagamento;
        if($request->tempoEstPreparo)
            $pedido->tempoEstPreparo = $request->tempoEstPreparo;
        if($request->tempoEstEntrega)
            $pedido->tempoEstEntrega = $request->tempoEstEntrega;
        if($request->status)
            $pedido->status = $request->status;
        $pedido->save();
        return response()->json([$pedido]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pedido::destroy($id);
        return response()->json(['Deletado!']);
    }
}
