<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Listar todas las sedes.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try{
            error_log("aca");
            $locations = Location::all();
            return response()->json($locations, 200);
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
        }
    }

    /**
     * Obtener una sede específica.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $location = Location::find($id); 
    
            if (!$location) {
                return response()->json(['error' => 'Sede no encontrada'], 404);
            }
            return response()->json($location, 200);
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
        }
    }

    /**
     * Crear una nueva sede.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try{
            $validatedData = $request->validate([
                'id' => 'required|integer|unique:locations,code',
                'name' => 'required|string|max:255',
                'image' => 'nullable|url',
            ]);

            $location = Location::create($validatedData);

            return response()->json($location, 201);
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
        }
    }

    /**
     * Actualizar una sede existente.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try{
            $location = Location::find($id);

            if (!$location) {
                return response()->json(['error' => 'Sede no encontrada'], 404);
            }

            $validatedData = $request->validate([
                'name' => 'sometimes|string|max:255',
                'image' => 'nullable|url',
            ]);

            $location->update($validatedData);

            return response()->json($location, 200);
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
        }
    }

    /**
     * Eliminar una sede.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try{
            $location = Location::find($id);

            if (!$location) {
                return response()->json(['error' => 'Sede no encontrada'], 404);
            }

            $location->delete();

            return response()->json(['message' => 'Sede eliminada con éxito'], 200);
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
        }
    }
}
