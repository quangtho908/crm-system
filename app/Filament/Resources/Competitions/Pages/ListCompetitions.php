<?php

namespace App\Filament\Resources\Competitions\Pages;

use App\Filament\Resources\Competitions\CompetitionsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCompetitions extends ListRecords
{
  protected static ?string $title = 'Danh sách cuộc thi';
  protected static string $resource = CompetitionsResource::class;

  protected function getHeaderActions(): array
  {
    return [
      CreateAction::make()
        ->label("Tạo mới cuộc thi"),
    ];
  }
}
