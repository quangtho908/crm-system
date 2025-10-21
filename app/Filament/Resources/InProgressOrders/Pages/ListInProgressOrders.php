<?php

namespace App\Filament\Resources\InProgressOrders\Pages;

use App\Filament\Resources\InProgressOrders\InProgressOrderResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListInProgressOrders extends ListRecords
{
  protected static string $resource = InProgressOrderResource::class;

  protected function getHeaderActions(): array
  {
    return [
      CreateAction::make()
        ->label("Tạo mới đơn hàng"),
    ];
  }
}
