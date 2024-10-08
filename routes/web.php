<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\WorkOrderController;

Route::get('/work-orders/create', [WorkOrderController::class, 'create'])->name('work_orders.create');
Route::post('/work-orders', [WorkOrderController::class, 'store'])->name('work_orders.store');


// Route to display the list of work orders
Route::get('/work-orders', [WorkOrderController::class, 'index'])->name('work_orders.index');

// Route to update the status of a work order
Route::post('/work-orders/{id}/status', [WorkOrderController::class, 'editStatus'])->name('work_orders.edit_status');


