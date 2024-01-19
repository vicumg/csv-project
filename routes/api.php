<?php

use App\Http\Controllers\Api\DataLoadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

Route::get('test-mongo', function (Request $request){
    $connection = DB::connection('mongodb');
    $msg =  "MongoDB connection established successfully.";
    try {
        $connection->command(['ping' => 1]);
    } catch (\Exception $e) {
        $msg = "MongoDB connection error: " . $e->getMessage();
    }
    return ['message' => $msg];
});

Route::post('data', DataLoadController::class);
