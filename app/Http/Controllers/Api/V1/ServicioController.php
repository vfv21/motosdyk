<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Servicio::all(), 200);//Mostrar todos los servicios
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validar datos
        $datos = $request->validate([
            'nombre' => ['required','string','max:200'],
            'descripcion' => ['nubable', 'string','max:250'],
        ]);
        //Guardar datos

        $servicio = Servicio ::create($datos);

        //Respuesta la cliente

        return response()->json([
            'success' => true,
            'menssage' => 'servicio creado exitosamente',
        ],201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        return response()->json($servicio, 200);//Mostrar servicio
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servicio $servicio)
    {
        //Validar datos
        $datos = $request->validate([
            'nombre' => ['required','string','max:200'],
            'descripcion' => ['nubable', 'string','max:250'],
        ]);

        //Actualizar  datos

        $servicio->update($datos);

        //Respuesta la cliente

        return response()->json([
            'success' => true,
            'menssage' => 'servicio actualizado exitosamente',
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
    {
        //eliminar un producto

        $servicio->delete();

        //Respuesta al cliente
        return response()->json([
            'success' => true,
            'menssage' => 'servicio eliminado exitosamente',
        ],204);




    }
}
