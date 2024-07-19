<?php

namespace App\Http\Controllers;

use App\Models\despacho;
use App\Models\vehiculo;
use App\Models\venta;
use Illuminate\Http\Request;

class despachoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $despachos = despacho::all();
        return view('sistema.listaDespachos', compact('despachos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $ventas = venta::all();
        return view('sistema.addDespacho', compact('ventas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $vehiculoId = $request->input('vehiculo_id');
        $vehiculo = vehiculo::find($vehiculoId);
        $vehiculo->stock = 0;
        $vehiculo->save();

        $ventaId = $request->input('venta_id');

        $despacho = new despacho();

        $despacho->venta()->associate($ventaId);
        $despacho->bodega = $request->input('bodega');
        $despacho->save();

        return view('/dashboard')->with('message', 'ok');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $venta = venta::find($id);
        $vehiculo = $venta->vehiculo;

        return view('sistema.addDespacho', compact('venta', 'vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
