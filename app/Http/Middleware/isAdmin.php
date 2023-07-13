<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        $userFound = User::with('role')->find($user->id);

        $admin_id = 1;
        $isAdmin = $userFound->role()->find($admin_id);

        if(!$isAdmin){
            return response()->json([
                'success' => true,
                'message' => 'No autorizado'
            ], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
