<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    if (Auth::guard()->user()) {
        return redirect()->route('role-permission-check');
    }
    Auth::login(User::where('email', 'admin@admin.com')->first());
    echo 'Logged in successfully goto <a href="' . route('role-permission-check') . '">Role Permission Check</a>';
})->name('login');

Route::get('/role-permission-check', function () {
    return view('index');
})->middleware('auth')->name('role-permission-check');
