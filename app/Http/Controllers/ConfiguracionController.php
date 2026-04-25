<?php

namespace App\Http\Controllers;
use App\Models\Configuracion;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    public function index()
    {
        $jsonData = file_get_contents('https://api.hilariweb.com/divisas');
        $divisas = json_decode($jsonData, true);

        $configuracion = Configuracion::first();
        return view('admin.configuracion.index', compact('configuracion', 'divisas'));
    }
    public function store(Request $request)
    {
        //$datos = request()-> all();
        //return response()->json($datos);
        request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'divisa' => 'required',
            'correo_electronico' => 'required|email',
            'logo' => 'image|mimes:jpeg,png,jpg',
        ]);

        //buscar si existe la configuracion
        $configuracion = Configuracion::first();
        if ($configuracion) {
            //actualizar
            $configuracion->nombre = $request->nombre;
            $configuracion->descripcion = $request->descripcion;
            $configuracion->direccion = $request->direccion;
            $configuracion->telefono = $request->telefono;
            $configuracion->divisa = $request->divisa;
            $configuracion->web = $request->web;
            $configuracion->correo_electronico = $request->correo_electronico;

            if ($request->hasFile('logo')) {
                // eliminar logo anterior solo si existe realmente
                $logoAnterior = public_path($configuracion->logo);
                if ($configuracion->logo && file_exists($logoAnterior)) {
                    unlink($logoAnterior);
                }
                $logoPath = $request->file('logo');
                $nombreArchivo = time() . '_' . $logoPath->getClientOriginalName();
                $rutaDestino = public_path('uploads/logos');
                if (!file_exists($rutaDestino)) {
                    mkdir($rutaDestino, 0755, true);
                }
                $logoPath->move($rutaDestino, $nombreArchivo);
                $configuracion->logo = 'uploads/logos/' . $nombreArchivo;
            }
            $configuracion->save();
            return redirect()->route('admin.configuracion.index')
            ->with('mensaje', 'Configuración actualizada correctamente')
            ->with('icono', 'success');
        }else{
            //crear nueva configuracion
            $configuracion = new Configuracion();
            $configuracion->nombre = $request->nombre;
            $configuracion->descripcion = $request->descripcion;
            $configuracion->direccion = $request->direccion;
            $configuracion->telefono = $request->telefono;
            $configuracion->divisa = $request->divisa;
            $configuracion->web = $request->web;
            $configuracion->correo_electronico = $request->correo_electronico;
            if ($request->hasFile('logo')) {
                //guardar logo
                $logoPath = $request->file('logo');
                $nombreArchivo = time() . '_' . $logoPath->getClientOriginalName();
                $rutaDestino = public_path('uploads/logos');
                if (!file_exists($rutaDestino)) {
                    mkdir($rutaDestino, 0755, true);
                }
                $logoPath->move($rutaDestino, $nombreArchivo);
                $configuracion->logo = 'uploads/logos/' . $nombreArchivo;
            }
            $configuracion->save();
            return redirect()->route('admin.configuracion.index')
            ->with('mensaje', 'Configuración creada correctamente')
            ->with('icono', 'success');
        }
    }
}
