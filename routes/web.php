<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

route::get('/todos', function () {
    return view('todos.index');
});

// route::get('/todos', [TodosController::class, 'index'])->name('todos');
// route::post('/todos', [TodosController::class, 'store'])->name('todos');

// route::get('/todos/{id}', [TodosController::class, 'show'])->name('todos-show');
// route::patch('/todos/{id}', [TodosController::class, 'update'])->name('todos-update');
// route::delete('/todos/{id}', [TodosController::class, 'destroy'])->name('todos-destroy');

route::prefix('api')->group(function () {
    route::controller(TodosController::class)->group(function () {
        route::get('/todos', 'index')->name('todos');
        route::post('/todos', 'store')->name('todos');

        route::get('/todos/{id}', 'show')->name('todos-show');
        route::patch('/todos/{id}', 'update')->name('todos-update');
        route::delete('/todos/{id}', 'destroy')->name('todos-destroy');
    });
});

Route::resource('categories', CategoriesController::class);
