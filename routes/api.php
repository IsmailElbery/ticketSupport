<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {

    Route::group(['prefix' => 'ticket'], function(){
        Route::post('create', [TicketController::class, 'save'])->name('createTicket');
        Route::get('all', [TicketController::class, 'getAllTickets'])->name('getAllTickets');
        Route::get('user/{id}', [TicketController::class, 'getTicketByUser'])->name('getUserTickets');

    });
});
