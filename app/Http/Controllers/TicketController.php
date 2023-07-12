<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class TicketController extends Controller
{
    public function getAllTickets()
    {
        try {
            $tickets = Ticket::select('id', 'date', 'customer', 'price_change', 'price', 'validated')
                ->get();
            return response()->json([
                'success' => 'true',
                'message' => 'Entradas recuperadas',
                'data' => $tickets
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error recuperando entradas ' . $th->getMessage());

            return response()->json([
                'success' => 'false',
                'message' => 'Error al recuperar entradas',
            ]);
        }
    }
}
