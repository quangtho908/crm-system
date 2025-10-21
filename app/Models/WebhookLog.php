<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebhookLog extends Model
{
    protected $table = 'webhook_logs';

    protected $fillable = [
        'source',
        'event_id',
        'signature',
        'payload',
        'status',
        'notes',
    ];

    protected $casts = [
        'payload' => 'array',
    ];
}
