<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends BaseController
{
    public function login(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('')->plainTextToken;

            return $this->successResponse([
                'user' => $user,
                'token' => $token,
            ], 200, 'Login bem-sucedido!');
        }

        return response()->json(['error' => 'Credenciais inválidas'], 401);
    }
    public function logout(Request $request)
    {
        // Revogar o token atual
        $request->user()->tokens->each(function ($token) {
            $token->delete();
        });

        return response()->json(['message' => 'Logout bem-sucedido!']);
    }
}
