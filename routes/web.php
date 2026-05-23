<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudySpotPageController;
use App\Http\Controllers\ReviewPageController;

Route::middleware('auth')->group(function () {
    Route::get('/study-spots/{studySpot}/reviews/create', [ReviewPageController::class, 'create'])->name('reviews.create');
    Route::post('/study-spots/{studySpot}/reviews', [ReviewPageController::class, 'store'])->name('reviews.store');
});

Route::get('/study-spots', [StudySpotPageController::class, 'index'])->name('study-spots.index');
Route::get('/study-spots/{studySpot}', [StudySpotPageController::class, 'show'])->name('study-spots.show');

Route::get('/', fn() => redirect()->route('study-spots.index'));

Route::get('/dashboard', function () {
    return redirect()->route('study-spots.index');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
Route::delete('/study-spots/{studySpot}/reviews/{review}', [ReviewPageController::class, 'destroy'])->name('reviews.destroy');
Route::get('/my-reviews', [ReviewPageController::class, 'myReviews'])->name('my-reviews');
Route::get('/study-spots/{studySpot}/reviews/{review}/edit', [ReviewPageController::class, 'edit'])->name('reviews.edit');
Route::put('/study-spots/{studySpot}/reviews/{review}', [ReviewPageController::class, 'update'])->name('reviews.update');
});

require __DIR__.'/auth.php';
