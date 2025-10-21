<?php

namespace App\Filament\Resources\DoneOrders\Pages;

use App\Filament\Resources\DoneOrders\DoneOrderResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDoneOrder extends EditRecord
{
  protected static string $resource = DoneOrderResource::class;
  protected static ?string $title = 'Chỉnh sửa đơn hàng';
  protected function getHeaderActions(): array
  {
    return [
      DeleteAction::make(),
    ];
  }
}
