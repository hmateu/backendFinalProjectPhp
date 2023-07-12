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
            $attractions = Attraction::select('id','name','min_height','max_height','length')
            ->get();
            return response()->json([
                'success' => 'true',
                'message' => 'Atracciones recuperadas',
                'data' => $attractions
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error recuperando atracciones ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al recuperar atracciones',
            ]);
        }
    }

    public function getAttractionById($id)
    {
        try {
            $attraction = Attraction::select('id','name','min_height','max_height','length')
            ->find($id);
            return response()->json([
                'success' => 'true',
                'message' => 'Atracción recuperada por id',
                'data' => $attraction
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error recuperando la atracción por id ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al recuperar la atracción por id',
            ]);
        }
    }

    public function getAttractionByName($name)
    {
        try {
            $attraction = Attraction::select('id','name','min_height','max_height','length')
            ->where('name', 'like', '%' . $name . '%')->get();
            return response()->json([
                'success' => 'true',
                'message' => 'Atracción recuperada por nombre',
                'data' => $attraction
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error recuperando la atracción por nombre  ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al recuperar la atracción por nombre',
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
            Log::error('Error creando la atracción ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al crear la atracción',
            ]);
        }
    }

    public function updateAttraction(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'id'=>'required',
                'name' => 'string',
                'min_height' => 'integer',
                'max_height' => 'integer',
                'length' => 'integer'
            ],[
                'name.string' => 'El nombre debe ser una cadena de texto',
                'min_height.integer' => 'La altura mínima es necesaria',
                'max_height.integer' => 'La altura máxima es necesaria',
                'length.integer' => 'La distancia es necesaria'
            ]);

            if($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
            $validData = $validator->validated();

            $attraction = Attraction::find($validData['id']);

            if(!$attraction){
                return response()->json([
                    'message'=>'Atracción no encontrada'
                ]);
            }

            if(isset($validData['name'])){
                $attraction->name = $validData['name'];
            }
            if(isset($validData['min_height'])){
                $attraction->min_height = $validData['min_height'];
            }
            if(isset($validData['max_height'])){
                $attraction->max_height = $validData['max_height'];
            }
            if(isset($validData['length'])){
                $attraction->length = $validData['length'];
            }

            $attraction->save();

            return response()->json([
                'success' => 'true',
                'message' => 'Atracción actualizada',
                'data' => $attraction
            ], Response::HTTP_OK);

        } catch (\Throwable $th) {
            Log::error('Error actualizando la atracción ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al actualizar la atracción',
            ]);
        }
    }

    public function deleteAttraction($id){
        try {
            Attraction::destroy($id);
            return response()->json([
                'success' => 'true',
                'message' => 'Atracción borrada'
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error borrando la atracción ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al borrar la atracción',
            ]);
        }
    }
}
