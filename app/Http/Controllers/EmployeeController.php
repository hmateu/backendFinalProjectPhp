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
            // $employees = Employee::get();
            $employees = Employee::select('employees.id', 'users.name', 'employees.email', 'attractions.name as attraction')
                ->leftJoin('users', 'users.id', 'employees.user')
                ->leftJoin('attractions', 'attractions.id', 'employees.attraction')
                ->get();
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
            $employee = Employee::select('employees.id', 'users.name', 'employees.email', 'attractions.name as attraction')
                ->leftJoin('users', 'users.id', 'employees.user')
                ->leftJoin('attractions', 'attractions.id', 'employees.attraction')
                ->find($id);
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
            $employee = Employee::select('employees.id', 'users.name', 'employees.email', 'attractions.name as attraction')
                ->leftJoin('users', 'users.id', 'employees.user')
                ->leftJoin('attractions', 'attractions.id', 'employees.attraction')
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
