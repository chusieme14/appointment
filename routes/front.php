<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::get('department/all',[DepartmentController::class,'getAllDepartments']);
Route::post('appointment/store',[AppointmentController::class,'store']);