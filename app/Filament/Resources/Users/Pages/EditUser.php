<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
  protected static string $resource = UserResource::class;
  protected static ?string $title = "Chỉnh sửa người dùng";
  protected function getHeaderActions(): array
  {
    return [
      DeleteAction::make(),
    ];
  }
}
