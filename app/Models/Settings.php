<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
  protected $table = 'settings';
  protected $fillable = [
    'prefix_payment_ladipage',
    'webhook_payment_ladipage',
    'x_api_key'
  ];
}
