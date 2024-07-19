<?php

namespace App\Http\Controllers;

use App\Models\vehiculo;
use App\Models\venta;
use Illuminate\Http\Request;
use ErlandMuchasaj\LaravelFileUploader\FileUploader;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = venta::all();
        return view('sistema.listaVenta', compact('ventas'));
    }

    public function uploadPost()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $vehiculos = vehiculo::all();
        return view('sistema.addVenta', compact('vehiculos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validacion = $request->validate([
            'autop' => 'required',
            'dni' => 'required|numeric|unique:clients,dni|min:10',
            'apellido' => 'required|string|max:75',
            'nombre' => 'required|string|max:75',
            'correo' => 'required|email|unique:clients,correo|max:100',
            'telefono' => 'required|numeric|min:12',
        ]);

        $venta = new venta();

        $placa = $request->input('autop');
        $auto = vehiculo::where('placa', $placa)->first();
        $autoId = $auto->id;

        $venta->vehiculo()->associate($autoId);
        $venta->dni = $request->input('dni');
        $venta->apellido = $request->input('apellido');
        $venta->nombre = $request->input('nombre');
        $venta->correo = $request->input('correo');
        $venta->telefono = $request->input('telefono');
        $venta->direccion = $request->input('direccion');

        $venta->save();

        return back()->with('message', 'ok');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        $id = $request->input('opcionauto');
        $vehiculo = vehiculo::find($id);

        return view('sistema.showVehi', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $placa)
    {
        //
        $vehiculo = vehiculo::all();
        return view('sistema.editVenta', compact('vehiculo'));
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
        $venta = venta::find($id);

        $venta->delete();

        return back();
    }
}
