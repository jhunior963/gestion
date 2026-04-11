<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Support\Facades\Validator as validador;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $niveles = Nivel::all();
          return view('admin.niveles.index', compact('niveles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_create' => 'required|max:255|unique:nivels,nombre',
        ]);
        $nivel = new Nivel();
        $nivel->nombre = $request->nombre_create;
        $nivel->save();

        return redirect()->route('admin.niveles.index')
        ->with('mensaje', 'Nivel creado exitosamente.')
        ->with('icon', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nivel $nivel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nivel $nivel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = validador::make($request->all(), [
            'nombre' => 'required|max:255|unique:nivels,nombre,' . $id,
        ]);

            if ($validate->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validate)
                    ->withInput()
                    ->with('modal_id',$id);
            }
        $nivel = Nivel::findOrFail($id);
        $nivel->nombre = $request->nombre;
        $nivel->save();

        return redirect()->route('admin.niveles.index')
        ->with('mensaje', 'Nivel actualizado exitosamente.')
        ->with('icon', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $id = Nivel::findOrFail($id);
        $id->delete();
        return redirect()->route('admin.niveles.index')
        ->with('mensaje', 'Nivel eliminado exitosamente.')
        ->with('icon', 'success');
    }
}
