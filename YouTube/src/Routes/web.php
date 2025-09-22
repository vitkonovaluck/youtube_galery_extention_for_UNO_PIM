<?php


use Extra\YouTube\Http\Controllers\YouTubeController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['admin'], 'prefix' => config('app.admin_url')], function () {
    Route::prefix('youtube')->group(function () {
        Route::get('/', [YouTubeController::class, 'index'])->name('admin.youtube.index');
        Route::get('/create', [YouTubeController::class, 'create'])->name('admin.youtube.create');
        Route::post('/store', [YouTubeController::class, 'store'])->name('admin.youtube.store');
        Route::delete('/{id}', [YouTubeController::class, 'destroy'])->name('admin.youtube.delete');
    });
});
