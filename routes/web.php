<?php

use App\Livewire\Users;
use App\Livewire\HomePage;
use App\Livewire\Admin\AdminManage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ProviderController;

Route::get('/', HomePage::class)->name('home');

Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect'])->name('redirect');

Route::get('/auth/{provider}/callback', [ProviderController::class,'callback'])->name('callback');


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
