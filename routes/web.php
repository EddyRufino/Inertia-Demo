<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/users', function () {
    return Inertia::render('Users/Index', [
        'time' => now()->toTimeString(),
        'users' => User::query()
            ->when(Request::input('search'), function($query, $search) {
                $query->where('name', 'LIKE', "%{$search}%");
            })
            ->paginate(4)
            ->withQueryString()
            ->through(function($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name
                ];
            }),
        'filters' => Request::only(['search'])
    ]);
});

Route::get('/users/create', function () {
    return Inertia::render('Users/Create');
});

Route::post('/users', function () {
    User::create(
        Request::validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ])
    );

    return redirect('/users');
});

Route::get('/settings', function () {
    return Inertia::render('Settings');
});

Route::post('/logout', function () {
    dd(request('foo'));
});
