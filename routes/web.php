<?php

use App\Livewire\Users;
use App\Livewire\HomePage;
use App\Livewire\Admin\AdminManage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


     Route::prefix('admin')
            ->as('admin.')
            ->middleware('redirect.admin')
            ->group(function () {

                Route::get('/manage', AdminManage::class)->name('page');
                Route::get('/users', Users::class)->name('data');
        });

    
   
    
});
