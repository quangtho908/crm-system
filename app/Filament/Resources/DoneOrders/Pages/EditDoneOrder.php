<?php

namespace App\Filament\Resources\DoneOrders\Pages;

use App\Filament\Resources\DoneOrders\DoneOrderResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDoneOrder extends EditRecord
{
    protected static string $resource = DoneOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
