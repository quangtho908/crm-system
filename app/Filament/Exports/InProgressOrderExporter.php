<?php

namespace App\Filament\Exports;

use App\Models\InProgressOrder;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class InProgressOrderExporter extends Exporter
{
  protected static ?string $model = InProgressOrder::class;

  public static function getColumns(): array
  {
    return [
      ExportColumn::make('id')
        ->label('ID'),
      ExportColumn::make('email'),
      ExportColumn::make('order_id'),
      ExportColumn::make('full_name'),
      ExportColumn::make('phone'),
      ExportColumn::make('address'),
      ExportColumn::make('country_name'),
      ExportColumn::make('state_name'),
      ExportColumn::make('district_name'),
      ExportColumn::make('ward_name'),
      ExportColumn::make('date_of_birth'),
      ExportColumn::make('school'),
      ExportColumn::make('grade'),
      ExportColumn::make('class'),
      ExportColumn::make('parents_name'),
      ExportColumn::make('achievement'),
      ExportColumn::make('product_name'),
      ExportColumn::make('price'),
      ExportColumn::make('total'),
      ExportColumn::make('note'),
      ExportColumn::make('created_at'),
      ExportColumn::make('updated_at'),
    ];
  }

  public static function getCompletedNotificationBody(Export $export): string
  {
    $body = 'Your in progress order export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

    if ($failedRowsCount = $export->getFailedRowsCount()) {
      $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
    }

    return $body;
  }
}
