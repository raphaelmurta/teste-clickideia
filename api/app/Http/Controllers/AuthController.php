<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $this->getCredentials($request);

        if ($this->authenticate($credentials)) {
            return $this->respondWithToken($this->createToken());
        }

        return $this->respondUnauthorized();
    }

    private function getCredentials(Request $request)
    {
        return $request->only('email', 'password');
    }

    private function authenticate(array $credentials)
    {
        return Auth::attempt($credentials);
    }

    private function createToken()
    {
        return JWTAuth::fromUser(Auth::user());
    }

    private function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
        ]);
    }

    private function respondUnauthorized()
    {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}

