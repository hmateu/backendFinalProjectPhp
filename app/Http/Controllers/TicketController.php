<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Ticket_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
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

    public function createTicket(Request $request)
    {
        try {
            $customer = auth()->user()->id;

            dd($customer);

            $validator = Validator::make($request->all(), [
                'date' => 'required|date',
                'ticket_type' => 'required|integer'
            ], [
                'date.required' => 'La fecha es necesaria',
                'date.date' => 'La fecha debe ser una fecha',
                'ticket_type.required' => 'El tipo de entrada es necesario',
                'ticket_type.integer' => 'El tipo de entrada debe ser un número'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
            $validData = $validator->validated();

            $price = Ticket_type::select('price')
                ->where('id', $validData['ticket_type'])
                ->value('price');

            // $arrayData = json_decode($price, true);

            // $price = $arrayData[0]['price'];

            $newTicket = Ticket::create([
                'date' => $validData['date'],
                'customer' => $customer,
                'ticket_type' => $validData['ticket_type'],
                'price' => $price,
                'validated' => 0
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Entrada creada',
                'data' => $newTicket
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error creando la entrada ' . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error al crear la entrada',
            ]);
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
