<?php

namespace App\Filament\Resources\Competitions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CompetitionsForm
{
  public static function configure(Schema $schema): Schema
  {
    return $schema
      ->components([
        TextInput::make('name')
          ->label('Tên')
          ->required(),
        TextInput::make('prefix_payment')
          ->label('Tiền tố nội dung thanh toán')
          ->required(),
      ]);
  }
}
