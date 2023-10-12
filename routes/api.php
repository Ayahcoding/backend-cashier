<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryController as ControllersCategoryController;

Route::apiResource('/category', CategoryController::class);