<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function getAllUsers()
    {
        try {
            $users = User::select('id', 'dni', 'name', 'surname', 'age', 'cp', 'mobile', 'email')
                ->get();
            return response()->json([
                'success' => 'true',
                'message' => 'Usuarios recuperados',
                'data' => $users
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error recuperando usuarios ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al recuperar usuarios',
            ]);
        }
    }

    public function getUserById($id)
    {
        try {
            $user = User::select('id', 'dni', 'name', 'surname', 'age', 'cp', 'mobile', 'email')
                ->find($id);
            return response()->json([
                'success' => 'true',
                'message' => 'Usuario recuperado por id',
                'data' => $user
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error recuperando el usuario por id ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al recuperar el usuario por id',
            ]);
        }
    }

    public function getUserByName($name)
    {
        try {
            $user = User::select('id', 'dni', 'name', 'surname', 'age', 'cp', 'mobile', 'email')
                ->where('name', 'like', '%' . $name . '%')
                ->get();
            return response()->json([
                'success' => 'true',
                'message' => 'Usuario recuperado por nombre',
                'data' => $user
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error recuperando el usuario por nombre ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al recuperar el usuario por nombre',
            ]);
        }
    }
}
