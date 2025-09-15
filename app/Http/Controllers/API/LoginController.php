<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation Fail',
                    'errors' => $validator->errors()
                ], 422);
            }

            $credentials = $request->only('email', 'password');
            if (!Auth::attempt($credentials)) {
                return response()->json(['status' => false, 'message' => 'Invalid credentials'], 401);
            }

            $user = Auth::user();
            $token = $user->createToken('api-token')->plainTextToken;
            return response()->json([
                'status' => true,
                'message' => 'Login success',
                'token' => $token,
                'user' => $user
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function me()
    {
        return response()->json([
            'user' => auth('sanctum')->user(),
        ]);
    }
}
