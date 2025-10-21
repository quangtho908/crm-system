<?php

namespace App\Filament\Resources\InProgressOrders\Pages;

use App\Filament\Resources\InProgressOrders\InProgressOrderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateInProgressOrder extends CreateRecord
{
  protected static ?string $title = 'Tạo đơn hàng mới';
  protected static string $resource = InProgressOrderResource::class;
}
