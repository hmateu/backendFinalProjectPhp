<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Support\Facades\Log;
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
}
