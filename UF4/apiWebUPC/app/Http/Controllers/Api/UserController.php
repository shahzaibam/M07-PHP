<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {

        $users = User::all();

        if($users->count() > 0) {
            return response()->json([
                'status' => 200,
                'users' => $users
            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'users' => 'No records found'
            ], 404);
        }

    }


    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'email' => 'required|string|max:191',
            'dni' => 'required|string|max:191',
            'password' => 'required|string|max:191',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }else {
            $newUser = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'dni' => $request->dni,
                'password' => Hash::make($request->password),
            ]);

            if($newUser) {
                $token = auth('api')->login($newUser);

                return response()->json([
                    'status' => 200,
                    'message' => 'User Created Successfully!',
                    'token' => $token,
                    'user' => $newUser
                ], 200);
            }else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong!'
                ], 500);
            }

        }



    }




    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (! $token = Auth::guard('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Obtener el usuario autenticado
        $user = Auth::guard('api')->user();

        return response()->json([
            'token' => $token,
            'user' => ['name' => $user->name]
        ]);
    }


}
