<?php

use App\Models\Settings;
use Carbon\Carbon;

if (!function_exists('format_price')) {
  function format_price($number, $currency = '₫'): string
  {
    return number_format($number, 0, ',', '.') . ' ' . $currency;
  }
}

if (!function_exists('vn_date')) {
  function vn_date($date, $format = 'd/m/Y H:i:s'): string
  {
    return Carbon::parse($date)->format($format);
  }
}

if (!function_exists('generate_order_code')) {
  function generate_order_code($prefix = 'ORD'): string
  {
    return $prefix . strtoupper(uniqid());
  }
}

if (!function_exists('validate_signature')) {
  function validate_signature($signature): string
  {
    $secret = get_signature();
    return !$secret || !$signature || !hash_equals($secret, $signature);
  }
}


if (!function_exists('get_secret')) {
  function get_signature(): string
  {
    $settings = Settings::query()->first();

    if (!$settings || !$settings["x_api_key"]) {
      return config('app.webhook_secret');
    }

    return $settings["x_api_key"];
  }
}
