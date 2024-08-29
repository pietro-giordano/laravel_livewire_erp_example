<?php

use App\Livewire\Attendances\AttendancesCreate;
use App\Livewire\Users\UsersCreate;
use App\Livewire\Users\UsersIndex;
use Illuminate\Support\Facades\Route;

Route::permanentRedirect('/', 'login');

Route::get('/register', function () {
    abort(404);
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('check-in-out', AttendancesCreate::class)->name('attendances.create');

    Route::name('users.')->group(function () {
        Route::get('users', UsersIndex::class)->name('index');
        Route::get('users/create', UsersCreate::class)->name('create');
    });
});
