<?php


use Illuminate\Support\Facades\Route;
use AdolphYu\FBMessenger\Http\Controllers\WebhookController;

Route::get(config('fb-messenger.custom_url','/webhook'), [WebhookController::class, 'verification'])->name('fb-messenger.verification');
Route::post(config('fb-messenger.custom_url','/webhook'), [WebhookController::class, 'receive'])->name('fb-messenger.receive');