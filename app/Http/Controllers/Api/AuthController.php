<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function Register(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validator->errors()]);
        } else {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            if ($user) {
                $token = $user->createToken($request->email)->plainTextToken;

                return response()->json(['status' => 'success', 'token' => $token, 'userId' => $user->id]);
            } else {
                return response()->json(['status' => 'error', 'msg' => "Registration Failed!!"]);
            }
        }
    }


    public function Login(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validator->errors()]);
        } else {

            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json(['status' => 'error', 'msg' => 'The provided credentials are incorrect!!']);
            } else {
                $token = $user->createToken($request->email)->plainTextToken;

                return response()->json(['status' => 'success', 'token' => $token, 'userId' => $user->id]);
            }
        }
    }


    public function Logout(Request $request)
    {
        $logout = $request->user()->tokens()->delete();

        if ($logout) {
            return response()->json(['status' => 'success', 'msg' => 'Logout Succesfull!!']);
        }
    }
}
