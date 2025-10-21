<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use App\Services\WebhookLog\WebhookLogService;
use Exception;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class ReceiveCassoWebhook extends Controller
{

  protected WebhookLogService $webhookLogService;
  public function __construct(WebhookLogService $webhookLogService)
  {
    $this->webhookLogService = $webhookLogService;
  }
  public function handle(Request $request)
  {
    $payload = $request->all();
    $log = $this->webhookLogService->get_pattern_log('', $payload);
    try {

      if (!$payload || !isset($payload["data"])) {
        throw new Exception("Không có nội dung");
      }

      $paymentInfo = $payload["data"];
      $settings = Settings::query()->first();

      if (!$settings || !$settings['prefix_payment_ladipage'] || !$settings['webhook_payment_ladipage']) {
        throw new Exception("Không có setting");
      }

      $content = '';
      if (preg_match('/' . $settings['prefix_payment_ladipage'] . '\d+/', $paymentInfo["description"] ?? "", $match)) {
        $content = $match[0];
      }

      if (!$content) {
        throw new Exception("Không có nội dung");
      }

      $forwardPayload = array(
        "gateway" => $paymentInfo["bankName"] ?? "",
        "transactionDate" => $paymentInfo["transactionDateTime"],
        "accountNumber" => $paymentInfo["accountNumber"],
        "content" => $content,
        "transferAmount" => $paymentInfo["amount"],
        "transferType" => "in",
      );
      $this->sendToLadiPage($forwardPayload, $settings['webhook_payment_ladipage']);
      $log->update([
        'status' => 'processed',
        'notes'  => 'Chuyển tiếp webhook thành công',
      ]);
    } catch (\Throwable $e) {
      $message = $e->getMessage();
      $log->update([
        'status' => 'failed',
        'notes'  => $message,
      ]);
      return response()->json(['message' => $message], 200);
    }
  }

  private function sendToLadiPage($data, $url)
  {

    $client = new Client([
      'timeout'  => 10.0,
    ]);
    $client->post($url, [
      'headers' => [
        'Content-Type' => 'application/json',
      ],
      'json' => $data,
    ]);
  }
}
