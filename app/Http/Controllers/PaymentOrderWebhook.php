<?php

namespace App\Http\Controllers;

use App\Models\DoneOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\InProgressOrder;
use App\Services\WebhookLog\WebhookLogService;
use Exception;

class PaymentOrderWebhook extends Controller
{
  protected WebhookLogService $webhookLogService;
  public function __construct(WebhookLogService $webhookLogService)
  {
    $this->webhookLogService = $webhookLogService;
  }
  public function handle(Request $request)
  {
    $signature = $request->header('X-Webhook-Signature');
    $payload = $request->all();

    // ✅ Ghi log ban đầu
    $log = $this->webhookLogService->get_pattern_log($signature, $payload);

    try {
      // ✅ Kiểm tra chữ ký
      if (validate_signature($signature)) {
        throw new Exception('Sai chữ ký');
      }

      $order = $payload['payload']['order'] ?? null;

      if (!$order) {
        throw new Exception('Thiếu thông tin');
      }

      $orderId = $order['order_id'];

      if (empty($orderId)) {
        throw new Exception('Thiếu order_id (creator_id) trong payload, không thể lưu InProgressOrder');
      }

      if (!isset($order['payment_callback_params']) || !isset($order['payment_callback_params']['content'])) {
        throw new Exception('Không có thông tin thanh toán');
      }

      $inProgressOrder = InProgressOrder::where('order_id', $orderId)->first();

      // ✅ Lưu order vào database
      DoneOrder::create([
        'order_id'         => "" . $orderId,
        'email'            => $order['customer_email'] ?? null,
        'full_name'        => $order['customer_first_name'] ?? null,
        'phone'            => $order['customer_phone'] ?? null,
        'address'          => $order['shipping_address'] ?? null,
        'country_name'     => $order['shipping_country_name'] ?? null,
        'state_name'       => $order['shipping_state_name'] ?? null,
        'district_name'    => $order['shipping_district_name'] ?? null,
        'ward_name'        => $order['shipping_ward_name'] ?? null,
        'date_of_birth'    => $order['custom_fields']['date_of_birth'] ?? null,
        'school'           => $order['custom_fields']['school'] ?? null,
        'grade'            => $order['custom_fields']['grade'] ?? null,
        'class'            => $order['custom_fields']['class'] ?? null,
        'parents_name'     => $order['custom_fields']['parents_name'] ?? null,
        'achievement'      => $order['custom_fields']['achievement'] ?? null,
        'product_name'     => $order['order_details'][0]['product_name'] ?? null,
        'price'            => $order['order_details'][0]['price'] ?? 0,
        'total'            => $order['total'] ?? 0,
        'note'             => $order['note'] ?? null,
        'bank'             => $order['payment_callback_params']['gateway'] ?? "",
        "transaction_date" => $order['payment_callback_params']['transactionDate'] ?? null,
        "account_number"   => $order['payment_callback_params']['accountNumber'] ?? null,
        "content"          => $order['payment_callback_params']['content']
      ]);

      if ($inProgressOrder) {
        $inProgressOrder->delete();
      }

      $log->update([
        'status' => 'processed',
        'notes'  => 'Lưu order thành công',
      ]);

      return response()->json(['message' => 'Order saved'], 200);
    } catch (\Throwable $e) {
      $log->update([
        'status' => 'failed',
        'notes'  => 'Error: ' . $e->getMessage(),
      ]);

      Log::error('Webhook error: ' . $e->getMessage(), [
        'trace' => $e->getTraceAsString(),
      ]);
      return response()->json(['message' => $e->getMessage()], 200);
    }
  }
}
