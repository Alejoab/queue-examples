<?php

use App\Actions\CreateUserAction;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', function () {
    $array = [
        'name' => fake()->name(),
        'email' => fake()->unique()->safeEmail(),
        'password' => '123456',
    ];
    CreateUserAction::execute($array);
    return response()->json(['message' => 'User created successfully!']);
});
