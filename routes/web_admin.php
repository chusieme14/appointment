<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
Route::get('/admin/api/checkuser',[AuthController::class,'checkuser']);
Route::post('/admin/api/loginrequest',[AuthController::class,'login']);
Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::get('/admin/api/logout',[AuthController::class,'logout']);
    Route::get('/auth/user',[AuthController::class,'getuser']);
    Route::get('/admin/appointment/{id}',[AppointmentController::class,'getAllAppointments']);
});

Route::get('admin/{any?}',function(){
    return view('welcome');
})->where('any','.*');