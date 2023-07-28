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
            $tickets = Ticket::select('id', 'date', 'customer', 'ticket_type', 'price', 'validated')
                ->with(['user:id,name,surname', 'ticket_type:id,name'])
                ->get();

            return response()->json([
                'success' => true,
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

    public function getMyTickets()
    {
        try {
            $id = auth()->user()->id;

            $myTickets = Ticket::select('id', 'date', 'customer', 'ticket_type', 'price', 'validated')
                ->with(['user:id,name,surname', 'ticket_type:id,name'])
                ->where('customer', $id)
                ->get();

            if ($myTickets->isEmpty()) {
                return response()->json([
                    'success' => true,
                    'message' => 'No has comprado ninguna entrada'
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Entradas propias recuperadas',
                'data' => $myTickets
            ]);
        } catch (\Throwable $th) {
            Log::error('Error booking your ticket: ' . $th->getMessage());

            return response()->json([
                'message' => 'Error booking your ticket'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function deleteTicket($id)
    {
        try {
            Ticket::destroy($id);
            return response()->json([
                'success' => true,
                'message' => 'Entrada eliminada'
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error eliminando la entrada ' . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar la entrada'
            ]);
        }
    }
}
