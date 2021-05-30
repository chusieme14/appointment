<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
Route::get('/admin/api/checkuser',[AuthController::class,'checkuser']);
Route::post('/admin/api/loginrequest',[AuthController::class,'login']);
Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::get('/admin/api/logout',[AuthController::class,'logout']);

    Route::get('/admin/department/all',[DepartmentController::class,'getAllDepartments']);
    Route::get('/auth/user',[AuthController::class,'getuser']);
    Route::get('/admin/role/all',[RoleController::class,'getAllRole']);
    Route::get('/admin/user/active',[UserController::class,'getActiveUser']);
    Route::get('/admin/appointment/waiting/{id}',[AppointmentController::class,'getAllWaiting']);
    Route::get('/admin/appointment/approved/{id}',[AppointmentController::class,'getAllApproved']);
    Route::post('/admin/add/user',[UserController::class,'create']);
    Route::post('/admin/check/username',[UserController::class,'checkUsername']);
    Route::post('/admin/check/email',[UserController::class,'checkEmail']);
    Route::put('/admin/update/user',[UserController::class,'update']);
    Route::delete('/admin/user/remove/{user_id}',[UserController::class,'destroy']);

    Route::put('/admin/accept/appointment',[AppointmentController::class,'accept']);
    Route::put('/admin/move/appointment',[AppointmentController::class,'move']);
    Route::delete('/admin/remove/appointment/{appt}',[AppointmentController::class,'destroy']);
});

Route::get('admin/{any?}',function(){
    return view('welcome');
})->where('any','.*');