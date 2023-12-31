<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function getAllUsers()
    {
        try {
            $users = User::select('id', 'dni', 'name', 'surname', 'age', 'cp', 'mobile', 'email')
                ->where('email', '!=', 'marta@gmail.com')
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
            // $user = User::select('id', 'dni', 'name', 'surname', 'age', 'cp', 'mobile', 'email')
            //     ->find($id);
            $user = User::with('role')->find($id);
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

    public function deleteMyAccount()
    {
        try {
            $user = auth()->user();

            $userFound = User::find($user->id);

            $userFound->delete();

            return response()->json([
                'success' => 'true',
                'message' => 'Cuenta eliminada',
                'data' => $user
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error al eliminar la cuenta ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al aliminar la cuenta',
            ]);
        }
    }

    public function deleteUserById($id)
    {
        try {
            User::destroy($id);
            return response()->json([
                'success' => true,
                'message' => 'Usuario eliminado'
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error eliminando el usuario ' . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el usuario'
            ]);
        }
    }

    public function restoreAccount($id)
    {
        try {
            User::withTrashed()->where('id', $id)->restore();

            return response()->json([
                'success' => 'true',
                'message' => 'Cuenta restaurada'
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error al restaurar la cuenta ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al restaurar la cuenta',
            ]);
        }
    }
}
