<?php

namespace App\Http\Controllers;

use App\Models\Attraction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class AttractionController extends Controller
{
    public function getAllAttractions()
    {
        try {
            $attractions = Attraction::get();
            return response()->json([
                'success' => 'true',
                'message' => 'Atracciones devueltas',
                'data' => $attractions
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error devolviendo atracciones ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al devolver atracciones',
            ]);
        }
    }

    public function getAttractionById($id)
    {
        try {
            $attraction = Attraction::find($id);
            return response()->json([
                'success' => 'true',
                'message' => 'Atracción devuelta',
                'data' => $attraction
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error capturando atracción ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al devolver la atracción',
            ]);
        }
    }

    public function getAttractionByName($name)
    {
        try {
            $attraction = Attraction::where('name', 'like', '%' . $name . '%')->get();
            return response()->json([
                'success' => 'true',
                'message' => 'Atracción devuelta',
                'data' => $attraction
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error capturando atracción ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al devolver la atracción',
            ]);
        }
    }

    public function createAttraction(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'min_height' => 'required|integer',
                'max_height' => 'required|integer',
                'length' => 'required|integer'
            ],[
                'name.required' => 'El nombre es necesario',
                'name.string' => 'El nombre debe ser una cadena de texto',
                'min_height.required' => 'La altura mínima es necesaria',
                'min_height.integer' => 'La altura mínima es necesaria',
                'max_height.required' => 'La altura máxima es necesaria',
                'max_height.integer' => 'La altura máxima es necesaria',
                'length.required' => 'La distancia es necesaria',
                'length.integer' => 'La distancia es necesaria'
            ]);

            if($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
            $validData = $validator->validated();

            $attraction = Attraction::create([
                'name' => $request->input('name'),
                'min_height' => $request->input('min_height'),
                'max_height' => $request->input('max_height'),
                'length' => $request->input('length')
            ]);
            return response()->json([
                'success' => 'true',
                'message' => 'Atracción creada',
                'data' => $attraction
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error al crear la atracción ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al crear la atracción',
            ]);
        }
    }
}
