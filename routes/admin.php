<?php

use App\Http\Controllers\Admin\BestController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SportController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;


Route::get('admin', [HomeController::class, 'index'])->middleware('can:admin.index')->name('admin.index');

Route::resource('admin/sports', SportController::class)->names('admin.sports');

Route::resource('admin/bests', BestController::class)->names('admin.bests');

Route::resource('admin/roles', RoleController::class)->names('admin.roles');

Route::resource('admin/type', TypeController::class)->names('admin.type');

Route::resource('admin/ticket',TicketController::class)->only('index','show')->names('admin.ticket');

Route::resource('admin/user', UserController::class)->only('index','update','edit')->names('admin.user');