<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request) 
    {
        $users = User::all();    
        return view('users.index', compact('users'));
    }

    public function show(Request $request, $id) 
    {
        try {
            $user = User::findOrFail($id);
            return response()->json([
                'user' => $user
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Пользователь с таким ID не найден'
            ], 404);
        }
    }

    public function store(StoreUserRequest $request) {
        $data = $request->validated();

        $user = User::create([
            'full_name' => $data['full_name'],
            'date_of_birth' => $data['date_of_birth'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'login' => $data['login'],
            'password' => $data['password']
        ]);
        return response()->json([
            'message' => 'Новый пользователь создан',
            'user' => $user
        ], 201);
    }

    public function destroy(Request $request, $id) 
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return response()->json([
                'message' => 'Пользователь успешно удален'
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Пользователь с таким ID не найден',
            ], 404);
        }
    }
}
