<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function getAllUsers()
    {
        try {
            $users = User::get();
            return response()->json([
                'success' => 'true',
                'message' => 'Usuarios devueltos',
                'data' => $users
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error getting users ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al devolver usuarios',
            ]);
        }
    }

    public function getUserById($id)
    {
        try {
            $user = User::find($id);
            return response()->json([
                'success' => 'true',
                'message' => 'Usuario devuelto',
                'data' => $user
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error capturando usuario ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al devolver el usuario',
            ]);
        }
    }

    public function getUserByName($name)
    {
        try {
            $user = User::where('name', 'like', '%' . $name . '%')->get();
            return response()->json([
                'success' => 'true',
                'message' => 'Usuario devuelto',
                'data' => $user
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error capturando usuario ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al devolver el usuario',
            ]);
        }
    }
}