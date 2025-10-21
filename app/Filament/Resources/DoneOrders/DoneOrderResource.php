<?php

namespace App\Filament\Resources\DoneOrders;

use App\Filament\Resources\DoneOrders\Pages\CreateDoneOrder;
use App\Filament\Resources\DoneOrders\Pages\EditDoneOrder;
use App\Filament\Resources\DoneOrders\Pages\ListDoneOrders;
use App\Filament\Resources\DoneOrders\Schemas\DoneOrderForm;
use App\Filament\Resources\DoneOrders\Tables\DoneOrdersTable;
use App\Models\DoneOrder;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DoneOrderResource extends Resource
{
  protected static ?string $model = DoneOrder::class;

  protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCheckCircle;

  protected static ?string $navigationLabel = "Đơn hàng đã thanh toán";

  public static function form(Schema $schema): Schema
  {
    return DoneOrderForm::configure($schema);
  }

  public static function table(Table $table): Table
  {
    return DoneOrdersTable::configure($table);
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
      'index' => ListDoneOrders::route('/'),
      'create' => CreateDoneOrder::route('/create'),
      'edit' => EditDoneOrder::route('/{record}/edit'),
    ];
  }
}
