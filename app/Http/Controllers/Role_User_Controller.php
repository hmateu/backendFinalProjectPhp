<?php

namespace App\Http\Controllers;

use App\Models\Attraction;
use App\Models\Role_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Role_User_Controller extends Controller
{
    public function createUserController(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'user' => 'required|integer',
                'role' => 'required|integer'
            ], [
                'user.required' => 'El usuario es necesario',
                'role.required' => 'El rol es necesario',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
            $validData = $validator->validated();

            $newUserRole = Role_User::create([
                'name' => $validData['name'],
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
}
