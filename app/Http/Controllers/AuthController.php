<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:4',
            'name' => 'nullable|string'
        ]);

        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            // Cria usuário simples para testes
            $user = User::create([
                'name' => $data['name'] ?? explode('@', $data['email'])[0],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            return response()->json(['message' => 'Usuário criado e logado', 'user' => $user], 201);
        }

        if (!Hash::check($data['password'], $user->password)) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

        return response()->json(['message' => 'Logado com sucesso', 'user' => $user]);
    }
}
