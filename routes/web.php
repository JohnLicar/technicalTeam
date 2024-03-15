<?php

use App\Livewire\Users\Index;
use App\Livewire\SystemConfig\Index as SystemConfigIndex;
use App\Livewire\Validation\Create;
use App\Livewire\Validation\Index as ValidationIndex;
use App\Livewire\Validation\Update;
use App\Livewire\Validation\View;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', 'approved'])
    ->name('dashboard');

Route::group(['prefix' => 'validation', 'middleware' => ['auth', 'approved']], function () {
    Route::get('/', ValidationIndex::class)->name('validation.index');
    Route::get('create', Create::class)->name('validation.create');
    Route::get('update/{applicant}', Update::class)->name('validation.update');
    Route::get('view/{applicant}', View::class)->name('validation.view');
});

Route::group(['prefix' => 'system-config', 'middleware' => ['auth', 'approved']], function () {
    Route::get('/', SystemConfigIndex::class)->name('system.index');
});


Route::group(['prefix' => 'users', 'middleware' => 'auth', 'approved'], function () {
    Route::get('/', Index::class)->name('users.index');
});

Route::view('profile', 'profile')
    ->middleware(['auth', 'approved'])
    ->name('profile');

require __DIR__ . '/auth.php';