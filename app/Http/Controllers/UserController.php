<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request) {
        return view('users.index');
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
}
