<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    public function getAllEmployees()
    {
        try {
            $employees = Employee::get();
            return response()->json([
                'success' => 'true',
                'message' => 'Empleados devueltos',
                'data' => $employees
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error recuperando empleados ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al devolver empleados',
            ]);
        }
    }

    public function getEmployeeById($id)
    {
        try {
            $employee = Employee::find($id);
            return response()->json([
                'success' => 'true',
                'message' => 'Empleado devuelto por id',
                'data' => $employee
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error recuperando el empleado por id ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al devolver el empleado por id',
            ]);
        }
    }

    public function getEmployeeByEmail($email)
    {
        try {
            $employee = Employee::where('email', 'like', '%' . $email . '%')->get();
            return response()->json([
                'success' => 'true',
                'message' => 'Empleado devuelto por nombre',
                'data' => $employee
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error recuperando el empleado por nombre ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al devolver el empleado por nombre',
            ]);
        }
    }
}
