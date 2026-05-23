<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudySpotController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\VoteController;

// TEST: if routes load, this will appear in route:list
Route::get('/ping', fn () => ['ok' => true]);

// Public read
Route::apiResource('study-spots', StudySpotController::class)
    ->only(['index','show'])
    ->names([
        'index' => 'api.study-spots.index',
        'show'  => 'api.study-spots.show',
    ]);
Route::get('study-spots/{studySpot}/reviews', [ReviewController::class, 'index']);
Route::get('study-spots/{studySpot}/reviews/{review}', [ReviewController::class, 'show']);

// Auth write
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('study-spots', StudySpotController::class)->only(['store','update','destroy']);

    Route::post('study-spots/{studySpot}/reviews', [ReviewController::class, 'storeApi']);
    Route::put('study-spots/{studySpot}/reviews/{review}', [ReviewController::class, 'update']);
    Route::delete('study-spots/{studySpot}/reviews/{review}', [ReviewController::class, 'destroy']);

    Route::get('reviews/{review}/comments', [CommentController::class, 'index']);
    Route::post('reviews/{review}/comments', [CommentController::class, 'store']);
    Route::put('reviews/{review}/comments/{comment}', [CommentController::class, 'update']);
    Route::delete('reviews/{review}/comments/{comment}', [CommentController::class, 'destroy']);

    Route::post('reviews/{review}/vote', [VoteController::class, 'store']);
    Route::delete('reviews/{review}/vote', [VoteController::class, 'destroy']);
});
