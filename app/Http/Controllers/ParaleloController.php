<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Paralelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ParaleloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $grados = Grado::with('paralelos')
        ->orderBy('nombre', 'asc')
        ->get();
        return view('admin.paralelos.index', compact('grados'));
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
         $request-> validate([
            'nombre' => 'required|string|max:255',
            'grado_id' => 'required|exists:grados,id',
        ]);
        $paralelo = new Paralelo();
        $paralelo->nombre = $request->nombre;
        $paralelo->grado_id = $request->grado_id;
        $paralelo->save();
        return redirect()->route('paralelos.index')
        ->with('success', 'Paralelo creado exitosamente')
        ->with('paralelo', $paralelo);
    }

    /**
     * Display the specified resource.
     */
    public function show(Paralelo $paralelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paralelo $paralelo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'grado_id' => 'required|exists:grados,id',
        ]);
        if ($validate->fails()) {
            return redirect()->back()
                ->withErrors($validate)
                ->withInput()
                ->with('modal_id', $id);
        }
        $paralelo = Paralelo::find($id);
        $paralelo->nombre = $request->nombre;
        $paralelo->grado_id = $request->grado_id;
        $paralelo->save();
        return redirect()->route('admin.paralelos.index')
            ->with('message', 'Paralelo actualizado exitosamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paralelo = Paralelo::find($id);
        $paralelo->delete();
        return redirect()->route('admin.paralelos.index')
            ->with('message', 'Paralelo eliminado exitosamente')
            ->with('icono', 'success');
    }
}
