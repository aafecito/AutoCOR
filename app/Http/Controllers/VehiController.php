<?php

namespace App\Http\Controllers;

use App\Models\vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $vehiculos = vehiculo::all();
        return view('sistema.listaVehi', compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('sistema.addVehi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validacion = $request->validate([
            'placa' => 'required|unique:vehiculos,placa',
            'nchasis' => 'required|unique:vehiculos,nchasis',
            'nmotor' => 'required|unique:vehiculos,nmotor',
            'marca' => 'required',
            'modelo' => 'required',
            'tipo' => 'required',
            'kilometraje' => 'required|numeric',
            'precio' => 'required|numeric',
            'año' => 'required'
        ]);

        $vehiculo = new vehiculo();

        $vehiculo->placa = $request->input('placa');
        $vehiculo->nchasis = $request->input('nchasis');
        $vehiculo->nmotor = $request->input('nmotor');
        $vehiculo->marca = $request->input('marca');
        $vehiculo->modelo = $request->input('modelo');
        $vehiculo->tipo = $request->input('tipo');
        $vehiculo->kilometraje = $request->input('kilometraje');
        $vehiculo->precio = $request->input('precio');
        $vehiculo->año = $request->input('año');
        $vehiculo->details1 = $request->input('details1');
        $vehiculo->details2 = $request->input('details2');
        $vehiculo->details3 = $request->input('details3');
        $vehiculo->stock = 1;

        $image = $request->file('img');
        $imagen = time() . '.' . $image->getClientOriginalExtension();
        $destino = public_path('storage/autos');
        $request->img->move($destino, $imagen);
        $vehiculo->image = $imagen;

        $vehiculo->save();

        return back()->with('message', 'ok');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //

        return 'hola';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $vehiculo = vehiculo::find($id);

        return view('sistema.editVehi', compact('vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $vehiculo = vehiculo::find($id);

        $vehiculo->placa = $request->input('placa');
        $vehiculo->nchasis = $request->input('nchasis');
        $vehiculo->nmotor = $request->input('nmotor');
        $vehiculo->marca = $request->input('marca');
        $vehiculo->modelo = $request->input('modelo');
        $vehiculo->tipo = $request->input('tipo');
        $vehiculo->kilometraje = $request->input('kilometraje');
        $vehiculo->precio = $request->input('precio');
        $vehiculo->año = $request->input('año');
        $vehiculo->details1 = $request->input('details1');
        $vehiculo->details2 = $request->input('details2');
        $vehiculo->details3 = $request->input('details3');

        $vehiculo->save();

        return back()->with('message', 'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $vehiculo = vehiculo::find($id);

        $vehiculo->delete();

        return back();
    }
}
