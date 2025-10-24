<?php

namespace App\Filament\Resources\DoneOrders\Tables;

use App\Filament\Exports\DoneOrderExporter;
use App\Models\DoneOrder;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ExportAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DoneOrdersTable
{
  public static function configure(Table $table): Table
  {
    return $table
      ->headerActions([
        ExportAction::make()
          ->label('Xuất dữ liệu')
          ->exporter(DoneOrderExporter::class),
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
        TextColumn::make('phone')
          ->label("Số điện thoại")
          ->searchable(),
        TextColumn::make('grade')
          ->label("Khối lớp")
          ->searchable(),
        TextColumn::make('class')
          ->label("Lớp học")
          ->searchable(),
        TextColumn::make('parents_name')
          ->label("Họ tên phụ huynh")
          ->searchable(),
        TextColumn::make('total')
          ->label("Tiền đã thanh toán")
          ->numeric()
          ->sortable(),
        TextColumn::make('transaction_date')
          ->label('Ngày thanh toán')
          ->searchable(),
        TextColumn::make('content')
          ->label('Nội dung thanh toán')
          ->searchable()
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
