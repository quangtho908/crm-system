<?php

namespace App\Filament\Resources\DoneOrders\Pages;

use App\Filament\Resources\DoneOrders\DoneOrderResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDoneOrders extends ListRecords
{
    protected static string $resource = DoneOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
