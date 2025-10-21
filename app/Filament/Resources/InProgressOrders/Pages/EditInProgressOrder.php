<?php

namespace App\Filament\Resources\InProgressOrders\Pages;

use App\Filament\Resources\InProgressOrders\InProgressOrderResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditInProgressOrder extends EditRecord
{
  protected static string $resource = InProgressOrderResource::class;
  protected static ?string $title = 'Chỉnh sửa đơn hàng';
  protected function getHeaderActions(): array
  {
    return [
      DeleteAction::make(),
    ];
  }
}
