<?php

use App\Http\Controllers\CreateOrderWebhook;
use App\Http\Controllers\PaymentOrderWebhook;
use App\Http\Controllers\ReceiveCassoWebhook;
use Illuminate\Support\Facades\Route;

Route::post('/webhooks/create-order', [CreateOrderWebhook::class, 'handle'])
  ->name('webhook.create-order')
  ->middleware('throttle:500,1');

Route::post('/webhooks/payment-order', [PaymentOrderWebhook::class, 'handle'])
  ->name('webhook.payment-order')
  ->middleware('throttle:500,1');

Route::post('/webhooks/receive-casso', [ReceiveCassoWebhook::class, 'handle'])
  ->name('webhook.receive-casso');
