<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->role->name == 'admin') {
            return response()->json([
                'users' => UserResource::collection(User::all())
            ]);
        }
        else{
            return response()->json([
                'message' => 'You are not authorized to access this resource'
            ], 403);
        }

    }

    public function store(Request $request)
    {
        if (auth('sanctum')->check()) {
            return response()->json([
                'message' => 'You are not authorized to access this resource'
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->refresh();
        return new UserResource($user);

    }

    public function show(Request $request , $id)
    {
        if (auth()->user()->id == $id) {
            return new UserResource(User::findOrFail($id));
        }
        else{
            return response()->json([
                'message' => 'You are not authorized to access this resource'
            ], 403);
        }
    }

    public function update(Request $request, $id)
    {
        if (auth()->user()->id == $id) {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $user = User::findOrFail($id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->save();
            return new UserResource($user);
        }
        else{
            return response()->json([
                'message' => 'You are not authorized to access this resource'
            ], 403);
        }
    }
}
