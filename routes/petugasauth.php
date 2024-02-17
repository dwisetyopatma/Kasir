<?php

use App\Http\Controllers\PetugasAuth\AuthenticatedSessionController;
use App\Http\Controllers\PetugasAuth\ConfirmablePasswordController;
use App\Http\Controllers\PetugasAuth\EmailVerificationNotificationController;
use App\Http\Controllers\PetugasAuth\EmailVerificationPromptController;
use App\Http\Controllers\PetugasAuth\NewPasswordController;
use App\Http\Controllers\PetugasAuth\PasswordController;
use App\Http\Controllers\PetugasAuth\PasswordResetLinkController;
use App\Http\Controllers\PetugasAuth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:petugas')->group(function () {

    Route::get('petugas/login', [AuthenticatedSessionController::class, 'create'])
                ->name('petugas.login');

    Route::post('petugas/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('petugas/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('petugas.password.request');

    Route::post('petugas/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('petugas.password.email');

    Route::get('petugas/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('petugas.password.reset');

    Route::post('petugas/reset-password', [NewPasswordController::class, 'store'])
                ->name('petugas.password.store');
});

Route::middleware('auth:petugas')->group(function () {
    Route::get('petugas/verify-email', EmailVerificationPromptController::class)
                ->name('petugas.verification.notice');

    Route::get('petugas/verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('petugas.verification.verify');

    Route::post('petugas/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('petugas.verification.send');

    Route::get('admin/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('petugas.password.confirm');

    Route::post('petugas/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('petugas/password', [PasswordController::class, 'update'])->name('petugas.password.update');

    Route::post('petugas/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('petugas.logout');
});
