<?php

use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Calendar;
use App\Http\Livewire\Category;
use App\Http\Livewire\Client;
use App\Http\Livewire\Components\EditUser;
use App\Http\Livewire\Inventory;
use App\Http\Livewire\PointSale;
use App\Http\Livewire\Reports;
use App\Http\Livewire\Roles;
use App\Http\Livewire\Service;
use App\Http\Livewire\ShowSale;
use App\Http\Livewire\Users;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('dashboard', DashboardController::class)->middleware('auth')->can('dashboard')->name('dashboard');

Route::get('category', Category::class)->middleware('auth')->can('category.index')->name('category.index');

Route::get('clients', Client::class)->middleware('auth')->can('client.index')->name('client.index');

Route::get('services', Service::class)->middleware('auth')->can('service.index')->name('service.index');

Route::get('inventory', Inventory::class)->middleware('auth')->can('inventory.index')->name('inventory.index');

Route::get('pointSale', PointSale::class)->middleware('auth')->can('pointsale.create')->name('pointsale.create');

Route::get('reports', Reports::class)->middleware('auth')->can('reports.index')->name('reports.index');

Route::get('reports/{venta}', ShowSale::class)->middleware('auth')->can('reports.show')->name('reports.show');

Route::get('users', Users::class)->middleware('auth')->can('users.index')->name('users.index');

Route::get('user/edit/{user}', EditUser::class)->middleware('auth')->can('users.edit')->name('users.edit');

Route::put('user/edit/{user}/role', [UserController::class, 'updateRole'])->middleware('auth')->can('users.update.role')->name('users.update.role');

Route::put('user/edit/{user}/permission', [UserController::class, 'updatePermission'])->middleware('auth')->can('users.update.permission')->name('users.update.permission');

Route::get('roles', Roles::class)->middleware('auth')->can('roles.index')->name('roles.index');

Route::get('calendar', Calendar::class)->middleware('auth')->name('calendar.index');


