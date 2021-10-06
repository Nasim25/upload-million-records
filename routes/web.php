<?php

use App\Http\Controllers\UploloadController;
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

Route::get('/', [UploloadController::class,'uploadFrom']);
Route::post('/upload-csv', [UploloadController::class,'uploadCsv']);

