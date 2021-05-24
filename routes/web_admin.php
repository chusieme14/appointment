<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/api/logout',[AuthController::class,'logout'])->middleware('auth:api');

Route::get('admin/{any?}',function(){
    return view('welcome');
})->where('any','.*');