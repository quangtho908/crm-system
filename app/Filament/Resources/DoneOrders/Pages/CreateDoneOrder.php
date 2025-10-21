<?php

namespace App\Filament\Resources\DoneOrders\Pages;

use App\Filament\Resources\DoneOrders\DoneOrderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDoneOrder extends CreateRecord
{
    protected static string $resource = DoneOrderResource::class;
}
