<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

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

        return redirect()->route('users.index')->with('success', 'Новый пользователь создан');

        // Если надр на JSON
        // return response()->json([
        //     'message' => 'Новый пользователь создан',
        //     'user' => $user
        // ], 201);
    }

    public function create() {
        return view('users.create');
    }

    public function update(UpdateUserRequest $request, $id) 
    {
        try {
            $user = User::findOrFail($id);
            $data = $request->validated();
            
            if(isEmpty($data['password'])) {
                unset($data['password']);
            }
            
            $user->update($data);

            return redirect()->route('users.index')->with('success', 'Пользователь изменён');
            
            // Если надо на JSON
            // return response()->json([
            //     'message' => 'Пользователь успешно обновлен',
            //     'user' => $user
            // ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Пользователь с таким ID не найден',
                'errors' => $e->getMessage()
            ], 404);
        }
    }

    public function edit($id)  
    {   
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
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
                'errors' => $e->getMessage()
            ], 404);
        }
    }
}
