<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/setup', function () {
    $credentials = [
        'email' => 'admin@admin.com',
        'password' => 'password'
    ];

    if (!Auth::attempt($credentials)) {
        $user = new User;
        $user->name = 'Admin';
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);
        $user->save();

        Auth::attempt($credentials);
    }

    $user = Auth::user();

    // Revoga tokens antigos antes de criar novos (opcional)
    $user->tokens()->delete();

    $adminToken = $user->createToken('adminToken', ['create', 'update', 'delete']);
    $updateToken = $user->createToken('updateToken', ['create', 'update']);
    $basicToken = $user->createToken('basicToken');

    return [
        'admin' => $adminToken->plainTextToken,
        'update' => $updateToken->plainTextToken,
        'basic' => $basicToken->plainTextToken,
    ];
});