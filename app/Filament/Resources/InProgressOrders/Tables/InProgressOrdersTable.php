<?php

namespace App\Filament\Resources\InProgressOrders\Tables;

use App\Filament\Exports\InProgressOrderExporter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ExportAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
// use App\Filament\Exports\ProductExporter;

class InProgressOrdersTable
{
  public static function configure(Table $table): Table
  {
    return $table
      ->headerActions([
        ExportAction::make()
          ->label('Xuất dữ liệu')
          ->exporter(InProgressOrderExporter::class),
      ])
      ->columns([
        TextColumn::make('order_id')
          ->label('Mã đơn hàng'),
        TextColumn::make('email')
          ->label('Email')
          ->searchable(),
        TextColumn::make('full_name')
          ->label("Họ tên")
          ->searchable(),
        TextColumn::make('product_name')
          ->label("Cuộc thi - gói")
          ->searchable(),
        TextColumn::make('phone')
          ->label("Số điện thoại")
          ->searchable(),
        TextColumn::make('grade')
          ->label("Khối lớp")
          ->searchable(),
        TextColumn::make('parents_name')
          ->label("Họ tên phụ huynh")
          ->searchable(),
        TextColumn::make('total')
          ->label("Tiền đã thanh toán")
          ->numeric()
          ->sortable(),
        TextColumn::make('created_at')
          ->label("Ngày nhập")
          ->dateTime()
          ->sortable()
          ->toggleable(isToggledHiddenByDefault: true),
      ])
      ->filters([
        //
      ])
      ->recordActions([
        EditAction::make(),
        ViewAction::make()
      ])
      ->toolbarActions([
        BulkActionGroup::make([
          DeleteBulkAction::make(),
        ]),
      ]);
  }
}
