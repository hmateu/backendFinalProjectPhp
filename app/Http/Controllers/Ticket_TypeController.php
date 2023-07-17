<?php

namespace App\Http\Controllers;

use App\Models\Ticket_Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class Ticket_TypeController extends Controller
{
    public function getAllTicket_Type()
    {
        try {
            $ticket_type = Ticket_Type::select('id', 'name', 'price', 'description')
                ->get();
            return response()->json([
                'success' => 'true',
                'message' => 'Tipos de entrada recuperados',
                'data' => $ticket_type
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error recuperando tipos de entrada ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al recuperar tipos de entrada',
            ]);
        }
    }

    public function getTicket_TypeById($id)
    {
        try {
            $ticket_type = Ticket_Type::select('id', 'name', 'price', 'description')
                ->find($id);
            return response()->json([
                'success' => 'true',
                'message' => 'Tipo de entrada recuperado por id',
                'data' => $ticket_type
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error recuperando el tipo de entrada por id ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al recuperar el tipo de entrada por id',
            ]);
        }
    }

    public function getTicket_TypeByName($name)
    {
        try {
            $ticket_type = Ticket_Type::select('id', 'name', 'price', 'description')
                ->where('name', 'like', '%' . $name . '%')
                ->get();
            return response()->json([
                'success' => 'true',
                'message' => 'Tipo de entrada recuperado por nombre',
                'data' => $ticket_type
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
