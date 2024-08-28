<?php

use App\Livewire\Users\UsersCreate;
use App\Livewire\Users\UsersIndex;
use Illuminate\Support\Facades\Route;

Route::permanentRedirect('/', 'login');

Route::get('/register', function () {
    abort(404);
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('users', UsersIndex::class)->name('users.index');
    Route::get('users/create', UsersCreate::class)->name('users.create');
});
