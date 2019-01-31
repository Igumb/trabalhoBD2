<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cozinheiro;

class CozinheiroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CozinheiroResource::collection(Cozinheiro::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cozinheiro = new Cozinheiro;
        $cozinheiro->ingrediente = $request->ingrediente;
        $cozinheiro->tempoDePreparo = $request->tempoDePreparo;
        $cozinheiro->idPedido = $request->idPedido;
        $cozinheiro->save();
        return response()->json([$cozinheiro]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cozinheiro = Cozinheiro:: findOrFail($id);
        return response()->json([$cozinheiro]);
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
        $cozinheiro = Cozinheiro::findOrFail($id);
        if($request->ingrediente)
            $cozinheiro->ingrediente = $request->ingrediente;
        if($request->tempoDePreparo)
            $cozinheiro->tempoDePreparo = $request->tempoDePreparo;
        if($request->idPedido)
            $cozinheiro->idPedido = $request->idPedido;
        $cozinheiro->save();
        return response()->json([$cozinheiro]);
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
