<?php

namespace App\Filament\Resources\InProgressOrders;

use App\Filament\Resources\InProgressOrders\Pages\CreateInProgressOrder;
use App\Filament\Resources\InProgressOrders\Pages\EditInProgressOrder;
use App\Filament\Resources\InProgressOrders\Pages\ListInProgressOrders;
use App\Filament\Resources\InProgressOrders\Schemas\InProgressOrderForm;
use App\Filament\Resources\InProgressOrders\Tables\InProgressOrdersTable;
use App\Models\InProgressOrder;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class InProgressOrderResource extends Resource
{
  protected static ?string $model = InProgressOrder::class;

  protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClock;

  protected static ?string $navigationLabel = "Đơn hàng đang chờ xử lý";

  public static function form(Schema $schema): Schema
  {
    return InProgressOrderForm::configure($schema);
  }

  public static function table(Table $table): Table
  {
    return InProgressOrdersTable::configure($table);
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
      'index' => ListInProgressOrders::route('/'),
      'create' => CreateInProgressOrder::route('/create'),
      'edit' => EditInProgressOrder::route('/{record}/edit'),
    ];
  }
}
