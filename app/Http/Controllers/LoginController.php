<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request) 
    {
        $credentials = $request->validated();

        if (! Auth::attempt($credentials))
            return response()->json(['message' => 'Usuário e/ou senha invalidos'], 401);

        $user = User::where('email', $credentials['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
    }
}
