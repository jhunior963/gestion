<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use App\Models\Gestion;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gestiones = Gestion::with('periodos')
        ->orderBy('nombre', 'asc')
        ->get();
        return view('admin.periodos.index', compact('gestiones'));
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
            'gestion_id' => 'required|exists:gestions,id',
            'nombre_create' => 'required|string|max:255|unique:periodos,nombre',
        ]);

        $periodo = new Periodo();
        $periodo->nombre = $request->nombre_create;
        $periodo->gestion_id = $request->gestion_id_create;
        $periodo->save();

        return redirect()->route('admin.periodos.index')
        ->with('mensaje', 'Periodo creado exitosamente.')
        ->with('icon', 'success');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Periodo $periodo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Periodo $periodo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'gestion_id' => 'required|exists:gestions,id',
            'nombre' => 'required|string|max:255',
        ]);
        if ($validate->fails()) {
            return redirect()
            ->back()
            ->withErrors($validate)
            ->withInput()
            ->with('modal_id', $id);
        }

        $periodo = Periodo::find($id);
        $periodo->nombre = $request->nombre;
        $periodo->gestion_id = $request->gestion_id;
        $periodo->save();

        return redirect()->route('admin.periodos.index')
        ->with('mensaje', 'Periodo actualizado exitosamente.')
        ->with('icon', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Periodo $periodo)
    {
        //
    }
}
