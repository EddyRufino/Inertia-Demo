<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome', [
        'name' => 'Eddy Rufino',
        'frameworks' => ['Laravel', 'Vue', 'Inertia']
    ]);
});
