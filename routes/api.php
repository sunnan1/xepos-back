<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: x-xsrf-token, Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length');
header('Access-Control-Allow-Origin: http://127.0.0.1:8080');
header('Access-Control-Allow-Credentials: true');
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function (){
   Route::get('/user', function (Request $request) {
       return $request->user();
   });
    Route::resource('company' , \App\Http\Controllers\CompanyController::class);
    Route::resource('employee' , \App\Http\Controllers\EmployeeController::class);
    Route::get('all-companies' , [\App\Http\Controllers\CompanyController::class , 'allCompany']);
});

