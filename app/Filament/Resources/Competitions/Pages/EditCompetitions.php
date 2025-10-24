<?php

namespace App\Filament\Resources\Competitions\Pages;

use App\Filament\Resources\Competitions\CompetitionsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCompetitions extends EditRecord
{

  protected static ?string $title = 'Chỉnh sửa cuộc thi';
  protected static string $resource = CompetitionsResource::class;

  protected function getHeaderActions(): array
  {
    return [
      DeleteAction::make(),
    ];
  }
}
