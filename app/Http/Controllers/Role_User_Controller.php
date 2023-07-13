<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Role_User;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class Role_User_Controller extends Controller
{

    public function createRoleUser(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'user' => 'required|integer',
                'role' => 'required|integer'
            ], [
                'user.required' => 'El usuario es necesarido',
                'user.integer' => 'El usuario debe ser un número',
                'role.required' => 'El rol es necesarido',
                'role.integer' => 'El rol debe ser un número',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $validData = $validator->validated();

            //Validar que la relación no exista en la tabla
            $existRoleUser = Role_User::where('user',$validData['user'])
                ->where('role',$validData['role']);

            $existUser = User::find($validData['user']);
            $existRole = Role::find($validData['role']);

            if($existUser === null){
                return response()->json([
                    'success' => true,
                    'message' => 'El usuario no existe'
                ], Response::HTTP_OK);
            }

            if($existRole === null){
                return response()->json([
                    'success' => true,
                    'message' => 'El rol no existe'
                ], Response::HTTP_OK);
            }

            if ($existRoleUser->exists()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Esta relación ya existe en la base de datos'
                ], Response::HTTP_OK);
            }

            $newRoleUser = Role_User::create([
                'user' => $validData['user'],
                'role' => $validData['role']
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Relación Rol_Usuario creada',
                'data' => $newRoleUser
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error creando la relación Rol_Usuario ' . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error al crear la relación Rol_Usuario',
            ]);
        }
    }

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
                    'message' => 'Relación Rol_Usuario no encontrada'
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
                'message' => 'Relación Rol_Usuario actualizada',
                'data' => $roleUser
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error actualizando la relación Rol_Usuario ' . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar la relación Rol_Usuario '
            ]);
        }
    }
}
