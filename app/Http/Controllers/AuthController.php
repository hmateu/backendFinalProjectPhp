<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'dni' => 'required|string|unique:users,dni',
                'name' => 'required|string',
                'surname' => 'required|string',
                'age' => 'required|integer',
                'cp' => 'required|integer',
                'mobile' => 'required|integer',
                'email' => 'required|email|unique:users,email',
                'password' => ['required', Password::min(8)->mixedCase()->numbers()]
            ],[
                'dni.required' => 'El DNI es necesario',
                'dni.string' => 'El DNI debe ser una cadena de texto',
                'dni.unique' => 'Este DNI no es válido',
                'name.required' => 'El nombre es necesario',
                'name.string' => 'El nombre debe ser una cadena de texto',
                'age.required' => 'La edad es necesaria',
                'age.integer' => 'La edad debe ser un número',
                'cp.required' => 'El código postal es necesario',
                'cp.integer' => 'El código postal debe ser un número',
                'mobile.required' => 'El teléfono es necesario',
                'mobile.integer' => 'El teléfono debe ser un número',
                'email.required' => 'El email es necesario',
                'email.string' => 'El email debe ser una cadena de texto',
                'email.unique' => 'El email ya existe, debes elegir otro',
                'password.required' => 'La contraseña es necesaria',
                'password.string' => 'La contraseña debe ser una cadena de texto',
            ]);

            if($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
            $validData = $validator->validated();

            $newUser = User::create([
                'dni'=>$validData['dni'],
                'name'=>$validData['name'],
                'surname'=>$validData['surname'],
                'age'=>$validData['age'],
                'cp'=>$validData['cp'],
                'mobile'=>$validData['mobile'],
                'email'=>$validData['email'],
                'password'=>bcrypt($validData['password'])
            ]);

            $token = $newUser->createToken('apiToken')->plainTextToken;

            return response()->json([
                'success'=>true,
                'message'=>'Usuario registrado',
                'data'=>$newUser
            ],Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            Log::error('Error registrando al usuario ' . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error registrando el usuario'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function login(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required'
            ], [
                'email'=> 'Email o contraseña no válido',
                'password' => 'Email o contraseña no válido'
            ]);
    
            if($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
            $validData = $validator->validated();
    
            $user = User::where('email', $validData['email'])->first();
    
            if(!$user){
                return response()->json([
                    'success' => true,
                    'message' => 'Email o contraseña no válido'
                ], Response::HTTP_FORBIDDEN);
            }
    
            if(!Hash::check($validData['password'], $user->password)){
                return response()->json([
                    'success' => true,
                    'message' => 'Email o contraseña no es válido'
                ], Response::HTTP_FORBIDDEN);
            }
    
            $token = $user->createToken('apiToken')->plainTextToken;
    
            return response()->json([
                'success' => true,
                'message' => 'Usuario logueado',
                'token' => $token
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            Log::error('Error logueando usuario ' . $th->getMessage());

            return response()->json([
                'message' => 'Error logueando usuario'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function profile(){
        try {
            $user = auth()->user();
            
            return response()->json([
                'success' => true,
                'message' => 'Usuario encontrado',
                'data' => $user
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error recuperando usuarios ' . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error recuperando usuarios'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function logout(Request $request){
        try {
            $headerToken = $request->bearerToken();

        $token = PersonalAccessToken::findToken($headerToken);

        $token->delete();

        return response()->json([
            'success' => true,
            'message' => 'Usuario deslogueado',
        ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error al desloguear el usuario ' . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error deslogueando el usuario'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}