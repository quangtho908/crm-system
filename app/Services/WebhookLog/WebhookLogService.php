<?php

namespace App\Services\WebhookLog;

use App\Models\WebhookLog;

class WebhookLogService
{
  public function get_pattern_log($signature, $payload)
  {
    return WebhookLog::create([
      'source'    => 'ladipage',
      'event_id'  => $payload['event'] ?? null,
      'signature' => $signature,
      'payload'   => json_encode($payload),
      'status'    => 'received',
      'notes'     => 'Webhook received',
    ]);
  }

  public function update() {}
}
