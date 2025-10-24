<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competitions extends Model
{
  protected $table = 'competitions';

  // Các cột được phép gán giá trị hàng loạt (mass assignable)
  protected $fillable = [
    'name',
    'prefix_payment'
  ];
}
