<?php

namespace App\Http\Controllers;

use App\Models\Attraction;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    public function getAllEmployees()
    {
        try {
            $employees = Employee::with('user:id,name')->with('attraction:id,name')->get();
            return response()->json([
                'success' => 'true',
                'message' => 'Empleados recuperados',
                'data' => $employees
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error recuperando empleados ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al recuperar empleados',
            ]);
        }
    }

    public function getEmployeeById($id)
    {
        try {
            $employee = Employee::with('user:id,name')->with('attraction:id,name')->find($id);
            return response()->json([
                'success' => 'true',
                'message' => 'Empleado recuperado por id',
                'data' => $employee
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error recuperando el empleado por id ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al recuperar el empleado por id',
            ]);
        }
    }

    public function getEmployeeByEmail($email)
    {
        try {
            $employee = Employee::with('user:id,name')->with('attraction:id,name')
                ->where('employees.email', 'like', '%' . $email . '%')
                ->get();
            return response()->json([
                'success' => 'true',
                'message' => 'Empleado recuperado por email',
                'data' => $employee
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error recuperando el empleado por email ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al recuperar el empleado por email',
            ]);
        }
    }

    public function createEmployee(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:employees,email',
                'password' => ['required', Password::min(8)->mixedCase()->numbers()],
                'user' => 'required|integer',
                'attraction' => 'required|integer'
            ], [
                'email.required' => 'El email es necesarido',
                'email.email' => 'El email debe ser de tipo email',
                'email.unique' => 'Este email ya existe',
                'password.required' => 'La contraseña es necesaria',
                'password.string' => 'La contraseña debe ser una cadena de texto',
                'user.required' => 'El usuario es necesario',
                'user.integer' => 'El usuario dede ser un número',
                'attraction.required' => 'La atracción es necesaria',
                'attraction.integer' => 'La atracción debe ser un número'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
            $validData = $validator->validated();

            //Validar que el usuario no esté ya asignado por un empleado anterior
            $duplicateUser = Employee::find($validData['user']);
            if($duplicateUser !== null){
                return response()->json([
                    'success' => true,
                    'message' => 'El usuario ya está registrado'
                ], Response::HTTP_OK);
            }

            //Validar que el usuario existe en la tabla users
            $existUser = User::find($validData['user']);
            if($existUser === null){
                return response()->json([
                    'success' => true,
                    'message' => 'El usuario no existe'
                ], Response::HTTP_OK);
            }
           
            //Validar que la atracción existe en la tabla attractions
            $existAttraction = Attraction::find($validData['attraction']);
            if($existAttraction === null){
                return response()->json([
                    'success' => true,
                    'message' => 'La atracción no existe'
                ], Response::HTTP_OK);
            }

            $newEmployee = Employee::create([
                'email' => $validData['email'],
                'password'=>bcrypt($validData['password']),
                'user' => $validData['user'],
                'attraction' => $validData['attraction']
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Empleado registrado',
                'data' => $newEmployee
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error creando el empleado ' . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error al crear el empleado',
            ]);
        }
    }
}
