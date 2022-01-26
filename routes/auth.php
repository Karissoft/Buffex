<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest')
                ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest')
                ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth')
                ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth', 'throttle:6,1'])
                ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');



// vendor auth
Route::get('/vendor-register', [RegisteredUserController::class, 'vendorcreate'])
  ->middleware('guest')
  ->name('vendorregister');

Route::post('/vendor-register', [RegisteredUserController::class, 'storevendor'])
  ->middleware('guest');

Route::get('/vendor-login', [AuthenticatedSessionController::class, 'vendorcreate'])
  ->middleware('guest')
  ->name('vendorlogin');

Route::post('/vendor-login', [AuthenticatedSessionController::class, 'storevendor'])
  ->middleware('guest');

Route::get('/vendor-forgot-password', [PasswordResetLinkController::class, 'vendorcreate'])
  ->middleware('guest')
  ->name('vendor.password.request');

Route::post('/vendor-forgot-password', [PasswordResetLinkController::class, 'storevendor'])
  ->middleware('guest')
  ->name('vendor.password.email');

Route::get('/vendor-reset-password/{token}', [NewPasswordController::class, 'vendorcreate'])
  ->middleware('guest')
  ->name('vendor.password.reset');

Route::post('/vendor-reset-password', [NewPasswordController::class, 'storevendor'])
  ->middleware('guest')
  ->name('vendor.password.update');

Route::get('/vendor-verify-email', [EmailVerificationPromptController::class, '__invokevendor'])
  ->middleware('auth')
  ->name('vendor.verification.notice');

Route::get('/vendor-verify-email/{id}/{hash}', [VerifyEmailController::class, '__invokevendor'])
  ->middleware(['auth', 'signed', 'throttle:6,1'])
  ->name('vendor.verification.verify');

Route::post('/vendor-email/verification-notification', [EmailVerificationNotificationController::class, 'storevendor'])
  ->middleware(['auth', 'throttle:6,1'])
  ->name('vendor.verification.send');

Route::get('/vendor-confirm-password', [ConfirmablePasswordController::class, 'showvendor'])
  ->middleware('auth')
  ->name('vendor.password.confirm');

Route::post('/vendor-confirm-password', [ConfirmablePasswordController::class, 'storevendor'])
  ->middleware('auth');

Route::post('/vendor-logout', [AuthenticatedSessionController::class, 'destroyvendor'])
  ->middleware('auth')
  ->name('vendorlogout');


// Admin auth
Route::get('/admin-register', [RegisteredUserController::class, 'admincreate'])
  ->middleware('guest')
  ->name('adminregister');

Route::post('/admin-register', [RegisteredUserController::class, 'storeadmin'])
  ->middleware('guest');

Route::get('/admin-login', [AuthenticatedSessionController::class, 'admincreate'])
  ->middleware('guest')
  ->name('adminlogin');

Route::post('/admin-login', [AuthenticatedSessionController::class, 'storeadmin'])
  ->middleware('guest');

Route::get('/admin-forgot-password', [PasswordResetLinkController::class, 'admincreate'])
  ->middleware('guest')
  ->name('admin.password.request');

Route::post('/admin-forgot-password', [PasswordResetLinkController::class, 'storeadmin'])
  ->middleware('guest')
  ->name('admin.password.email');

Route::get('/admin-reset-password/{token}', [NewPasswordController::class, 'admincreate'])
  ->middleware('guest')
  ->name('admin.password.reset');

Route::post('/admin-reset-password', [NewPasswordController::class, 'storeadmin'])
  ->middleware('guest')
  ->name('admin.password.update');

Route::get('/admin-verify-email', [EmailVerificationPromptController::class, '__invokeadmin'])
  ->middleware('auth')
  ->name('admin.verification.notice');

Route::get('/admin-verify-email/{id}/{hash}', [VerifyEmailController::class, '__invokeadmin'])
  ->middleware(['auth', 'signed', 'throttle:6,1'])
  ->name('admin.verification.verify');

Route::post('/admin-email/verification-notification', [EmailVerificationNotificationController::class, 'storeadmin'])
  ->middleware(['auth', 'throttle:6,1'])
  ->name('admin.verification.send');

Route::get('/admin-confirm-password', [ConfirmablePasswordController::class, 'showadmin'])
  ->middleware('auth')
  ->name('admin.password.confirm');

Route::post('/admin-confirm-password', [ConfirmablePasswordController::class, 'storeadmin'])
  ->middleware('auth');

Route::post('/admin-logout', [AuthenticatedSessionController::class, 'destroyadmin'])
  ->middleware('auth')
  ->name('adminlogout');
