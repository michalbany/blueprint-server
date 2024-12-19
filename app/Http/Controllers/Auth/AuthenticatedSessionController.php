<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     * #fixme: Možná vrátit zpět to co je zakomentované je to pro HTTPIE, které nepoužívá cookies
     */
    public function store(LoginRequest $request)
    {
        // $request->authenticate();

        $auth = Auth::attempt($request->only('email', 'password'));

        if (! $auth) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        // $request->session()->regenerate();

        // return response()->noContent();

        $token = Auth::user()->createToken('API Token');

        return response()->json([
            'token' => $token->plainTextToken,
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
