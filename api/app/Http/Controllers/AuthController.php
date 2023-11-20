<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(LoginAuthRequest $request)
    {

        $credentials = $request->only('email', 'password');
        $token = Auth::guard('api')->attempt($credentials);

        if (!$token) {
            return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function logout()
    {
        Auth::guard('api')->logout();

        return response()->json(['status' => 'success', 'message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        // Gerar um novo token
        return $this->respondWithToken(Auth::guard('api')->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'status' => 'success',
            'type' => 'bearer',
            'access_token' => $token,
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60,
            'role' => Auth::guard('api')->user()->role,
        ]);
    }
}
