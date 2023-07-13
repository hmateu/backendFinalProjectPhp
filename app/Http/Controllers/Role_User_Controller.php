<?php

namespace App\Http\Controllers;

use App\Models\Role_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class Role_User_Controller extends Controller
{
    public function updateRoleUser(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer',
                'user' => 'required|integer',
                'role' => 'required|integer',
            ], [
                'id.required' => 'El id es requerido',
                'id.integer' => 'El id debe ser un número',
                'user.required' => 'El usuario es requerido',
                'user.integer' => 'El nombre debe ser un número',
                'role.required' => 'El usuario es requerido',
                'role.integer' => 'El nombre debe ser un número'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
            $validData = $validator->validated();

            $roleUser = Role_User::find($validData['id']);

            // dd($roleUser);

            if (!$roleUser) {
                return response()->json([
                    'success' => true,
                    'message' => 'Relación Rol_User no encontrada'
                ]);
            }

            if (isset($validData['user'])) {
                $roleUser->user = $validData['user'];
            }
            if (isset($validData['role'])) {
                $roleUser->role = $validData['role'];
            }

            $roleUser->save();

            return response()->json([
                'success' => true,
                'message' => 'Relación Rol_User actualizada',
                'data' => $roleUser
            ], Response::HTTP_OK);

        } catch (\Throwable $th) {
            Log::error('Error actualizando la relación Rol_User ' . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar la relación Rol_User '
            ]);
        }
    }
}
