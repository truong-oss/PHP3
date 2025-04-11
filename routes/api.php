<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;
Route::post('/login', [AuthController::class, 'login']);
//mặc định apiResource sẽ trỏ tới 5 hàm mặc định trong controller api
//nếu muốn tạo ra các phương thức mới trg controller api
//thì ta phải tạo thêm các route khác để chỏ riêng tới phương thức đó
//route tạo thêm phải ở trên apiresource

Route::apiResource('products', ProductController::class)->middleware('auth:sanctum');
