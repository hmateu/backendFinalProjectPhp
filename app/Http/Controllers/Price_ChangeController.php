<?php

namespace App\Http\Controllers;

use App\Models\Price_Change;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class Price_ChangeController extends Controller
{
    public function getAllPrice_Change()
    {
        try {
            $price_change = Price_Change::select('id', 'name', 'price', 'description')
                ->get();
            return response()->json([
                'success' => 'true',
                'message' => 'Tipos de entrada recuperados',
                'data' => $price_change
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error recuperando tipos de entrada ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al recuperar tipos de entrada',
            ]);
        }
    }

    public function getPrice_ChangeById($id)
    {
        try {
            $price_change = Price_Change::select('id', 'name', 'price', 'description')
                ->find($id);
            return response()->json([
                'success' => 'true',
                'message' => 'Tipo de entrada recuperado por id',
                'data' => $price_change
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error recuperando el tipo de entrada por id ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al recuperar el tipo de entrada por id',
            ]);
        }
    }

    public function getPrice_ChangeByName($name)
    {
        try {
            $price_change = Price_Change::select('id', 'name', 'price', 'description')
                ->where('name', 'like', '%' . $name . '%')
                ->get();
            return response()->json([
                'success' => 'true',
                'message' => 'Tipo de entrada recuperado por nombre',
                'data' => $price_change
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error recuperando el tipo de entrada por nombre ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al recuperar el tipo de entrada por nombre',
            ]);
        }
    }
}
