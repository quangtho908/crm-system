<?php

namespace App\Filament\Resources\Competitions\Pages;

use App\Filament\Resources\Competitions\CompetitionsResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCompetitions extends CreateRecord
{
  protected static ?string $title = 'Tạo cuộc thi mới';
  protected static string $resource = CompetitionsResource::class;
}
