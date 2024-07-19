<?php

use App\Actions\CreateUserAction;
use App\Actions\DeleteUserAction;
use App\Models\User;
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
})->name('users.create');

Route::get('/user/{user}/delete', function (User $user) {
    DeleteUserAction::execute($user);
    return response()->json(['message' => 'User deleted successfully!']);
})->name('users.delete');
