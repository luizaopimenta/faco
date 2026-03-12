<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UploadController;

// Rota de login
Route::post('/login', [AuthController::class, 'login']);

// Uploads (imagem e vídeo)
Route::post('/upload/image', [UploadController::class, 'uploadImage']);
Route::post('/upload/video', [UploadController::class, 'uploadVideo']);
