<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\vehiculo;
use App\Models\venta;
use Illuminate\Http\Request;

class VentaControlador extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('sistema.addVenta');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        //
        $venta = new venta();
        $vehiculoId = vehiculo::find($id);
        $venta->vehiculo()->associate($vehiculoId);
        // asigna otros campos de la venta
        $venta->save();

        return $venta;
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        //
        $id = 'Este mensaje no deberia aparecer';
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show(string $id)
    {
        //
        $id = 'hola';
        return $id;
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
