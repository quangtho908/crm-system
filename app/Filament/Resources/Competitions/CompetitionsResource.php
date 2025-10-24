<?php

namespace App\Filament\Resources\Competitions;

use App\Filament\Resources\Competitions\Pages\CreateCompetitions;
use App\Filament\Resources\Competitions\Pages\EditCompetitions;
use App\Filament\Resources\Competitions\Pages\ListCompetitions;
use App\Filament\Resources\Competitions\Schemas\CompetitionsForm;
use App\Filament\Resources\Competitions\Tables\CompetitionsTable;
use App\Models\Competitions;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CompetitionsResource extends Resource
{
  protected static ?string $model = Competitions::class;

  protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

  protected static ?string $navigationLabel = "Cuộc thi";
  public static function form(Schema $schema): Schema
  {
    return CompetitionsForm::configure($schema);
  }

  public static function table(Table $table): Table
  {
    return CompetitionsTable::configure($table);
  }

  public static function getRelations(): array
  {
    return [
      //
    ];
  }

  public static function getPages(): array
  {
    return [
      'index' => ListCompetitions::route('/'),
      'create' => CreateCompetitions::route('/create'),
      'edit' => EditCompetitions::route('/{record}/edit'),
    ];
  }
}
