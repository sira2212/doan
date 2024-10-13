<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\EquipmentController;
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/index', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::prefix('admin/menu')->group(function () {
    Route::get('/', [MenuController::class, 'index'])->name('admin-menu');
    Route::get('/create', [MenuController::class, 'create'])->name('admin-menu-create');
    Route::post('/', [MenuController::class, 'store'])->name('admin-menu-store');
    Route::get('/{id}/edit', [MenuController::class, 'edit'])->name('admin-menu-edit');
    Route::post('/{id}', [MenuController::class, 'update'])->name('admin-menu-update');
    Route::get('/{id}', [MenuController::class, 'destroy'])->name('admin-menu-delete');
});
Route::prefix('admin/room')->group(function () {
    Route::get('/', [RoomController::class, 'index'])->name('admin-room');
    Route::get('/create', [RoomController::class, 'create'])->name('admin-room-create');
    Route::post('/', [RoomController::class, 'store'])->name('admin-room-store');
    Route::get('/{id}/edit', [RoomController::class, 'edit'])->name('admin-room-edit');
    Route::post('/{id}', [RoomController::class, 'update'])->name('admin-room-update');
    Route::get('/{id}', [RoomController::class, 'destroy'])->name('admin-room-delete');
});

Route::prefix('admin/equipment')->group(function () {
    Route::get('/', [EquipmentController::class, 'index'])->name('admin-equipment');
    Route::get('/create', [EquipmentController::class, 'create'])->name('admin-equipment-create');
    Route::post('/', [EquipmentController::class, 'store'])->name('admin-equipment-store');
    Route::get('/{id}/edit', [EquipmentController::class, 'edit'])->name('admin-equipment-edit');
    Route::post('/{id}', [EquipmentController::class, 'update'])->name('admin-equipment-update');
    Route::get('/{id}', [EquipmentController::class, 'destroy'])->name('admin-equipment-delete');
});

require __DIR__.'/auth.php';
