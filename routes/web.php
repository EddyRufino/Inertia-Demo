<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('users', function () {
    return Inertia::render('Users', [
        'time' => now()->toTimeString(),
        'users' => User::all()->map(function($user) {
            return [
                'name' => $user->name
            ];
        }),
    ]);
});

Route::get('settings', function () {
    return Inertia::render('Settings');
});

Route::post('logout', function () {
    dd(request('foo'));
});
