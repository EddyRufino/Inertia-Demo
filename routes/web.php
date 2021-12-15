<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::middleware('auth')->group(function () {

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
                        'name' => $user->name,
                        'can' => [
                            'edit' => Auth::user()->can('edit', $user)
                        ]
                    ];
                }),
            'filters' => Request::only(['search']),
            'can' => [
                'createUser' => Auth::user()->can('create', User::class)
            ]
        ]);
    });

    Route::get('/users/create', function () {
        return Inertia::render('Users/Create');
    })->can('create', 'App\Models\User');

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

});
