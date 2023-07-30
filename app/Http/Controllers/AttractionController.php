<?php

namespace App\Http\Controllers;

use App\Models\Attraction;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class AttractionController extends Controller
{
    public function getAllAttractions()
    {
        try {
            $attractions = Attraction::select('id', 'picture', 'name', 'description', 'min_height', 'max_height', 'length')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Atracciones recuperadas',
                'data' => $attractions
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error recuperando atracciones ' . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error al recuperar atracciones',
            ]);
        }
    }

    public function getAllAttractionsByAdmin()
    {
        try {
            $attractions = Employee::select('id', 'attraction', 'user')
                ->with(['attraction:id,name,picture', 'user:id,name'])
                ->get();

            $employeesByAttraction = $attractions->groupBy('attraction');

            return response()->json([
                'success' => true,
                'message' => 'Atracciones recuperadas',
                'data' => $employeesByAttraction
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error recuperando atracciones ' . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error al recuperar atracciones',
            ]);
        }
    }

    public function getAttractionById($id)
    {
        try {
            $attraction = Attraction::select('id', 'picture', 'name', 'description', 'min_height', 'max_height', 'length')
                ->find($id);
            if ($attraction === null) {
                return response()->json([
                    'success' => true,
                    'message' => 'No existe ninguna atracción por dicho id'
                ], Response::HTTP_OK);
            }
            return response()->json([
                'success' => true,
                'message' => 'Atracción recuperada por id',
                'data' => $attraction
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error recuperando la atracción por id ' . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error al recuperar la atracción por id',
            ]);
        }
    }

    public function getAttractionByName($name)
    {
        try {
            $attraction = Attraction::select('id', 'name', 'description', 'min_height', 'max_height', 'length')
                ->where('name', 'like', '%' . $name . '%')->get();

            if (count($attraction) === 0) {
                return response()->json([
                    'success' => true,
                    'message' => 'No existe ninguna atracción que contenga dicha cadena de texto en el nombre'
                ], Response::HTTP_OK);
            }
            return response()->json([
                'success' => true,
                'message' => 'Atracción recuperada por nombre',
                'data' => $attraction
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error recuperando la atracción por nombre  ' . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error al recuperar la atracción por nombre',
            ]);
        }
    }

    public function createAttraction(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|unique:attractions,name',
                'description' => 'required|text',
                'min_height' => 'required|integer',
                'max_height' => 'required|integer',
                'length' => 'required|integer'
            ], [
                'name.required' => 'El nombre es necesario',
                'name.string' => 'El nombre debe ser una cadena de texto',
                'description.required' => 'La descripción es necesaria',
                'description.text' => 'La descripción debe ser un texto',
                'name.unique' => 'Esa atracción ya existe',
                'min_height.required' => 'La altura mínima es necesaria',
                'min_height.integer' => 'La altura mínima es necesaria',
                'max_height.required' => 'La altura máxima es necesaria',
                'max_height.integer' => 'La altura máxima es necesaria',
                'length.required' => 'La distancia es necesaria',
                'length.integer' => 'La distancia es necesaria'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
            $validData = $validator->validated();

            $newAttraction = Attraction::create([
                'name' => $validData['name'],
                'description' => $validData['description'],
                'min_height' => $validData['min_height'],
                'max_height' => $validData['max_height'],
                'length' => $validData['length']
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Atracción creada',
                'data' => $newAttraction
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error creando la atracción ' . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error al crear la atracción',
            ]);
        }
    }

    public function updateAttraction(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer',
                'name' => 'string|unique:attractions,name',
                'description' => 'text',
                'min_height' => 'integer',
                'max_height' => 'integer',
                'length' => 'integer'
            ], [
                'id.required' => 'El id es requerido',
                'id.integer' => 'El id debe ser un número',
                'name.string' => 'El nombre debe ser una cadena de texto',
                'name.unique' => 'Esa atracción ya existe',
                'description.text' => 'La descripción es necesaria',
                'min_height.integer' => 'La altura mínima es necesaria',
                'max_height.integer' => 'La altura máxima es necesaria',
                'length.integer' => 'La distancia es necesaria'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
            $validData = $validator->validated();

            $attraction = Attraction::find($validData['id']);

            if (!$attraction) {
                return response()->json([
                    'success' => true,
                    'message' => 'Atracción no encontrada'
                ]);
            }

            if (isset($validData['name'])) {
                $attraction->name = $validData['name'];
            }
            if (isset($validData['min_height'])) {
                $attraction->min_height = $validData['min_height'];
            }
            if (isset($validData['max_height'])) {
                $attraction->max_height = $validData['max_height'];
            }
            if (isset($validData['length'])) {
                $attraction->length = $validData['length'];
            }

            $attraction->save();

            return response()->json([
                'success' => true,
                'message' => 'Atracción actualizada',
                'data' => $attraction
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error actualizando la atracción ' . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar la atracción',
            ]);
        }
    }

    public function deleteAttraction($id)
    {
        try {
            Attraction::destroy($id);
            return response()->json([
                'success' => true,
                'message' => 'Atracción eliminada'
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error eliminando la atracción ' . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar la atracción'
            ]);
        }
    }
}
