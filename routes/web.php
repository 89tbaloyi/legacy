<?php

use App\Models\Task;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CustomerController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $tasks = Task::all();
    return view('dashboard', compact('tasks'));
    
})->name('dashboard');
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
Route::post('/tasks', [TaskController::class, 'store'])->name('task-store');
Route::get('task/edit/{id}', [TaskController::class, 'edit']);
Route::post('task/update/{id}', [TaskController::class, 'update'])->name('task-update');
Route::get('task/delete/{id}', [TaskController::class, 'destroy']);
