<?php

namespace App\Filament\Resources\DoneOrders\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DoneOrdersTable
{
  public static function configure(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('email')
          ->label('Email address')
          ->searchable(),
        TextColumn::make('full_name')
          ->searchable(),
        TextColumn::make('phone')
          ->searchable(),
        TextColumn::make('grade')
          ->searchable(),
        TextColumn::make('class')
          ->searchable(),
        TextColumn::make('parents_name')
          ->searchable(),
        TextColumn::make('total')
          ->numeric()
          ->sortable(),
        TextColumn::make('transaction_date')
          ->searchable(),
        TextColumn::make('account_number')
          ->searchable(),
        TextColumn::make('bank')
          ->searchable(),
        TextColumn::make('content')
          ->searchable(),
        TextColumn::make('created_at')
          ->dateTime()
          ->sortable()
          ->toggleable(isToggledHiddenByDefault: true),
      ])
      ->filters([
        //
      ])
      ->recordActions([
        EditAction::make(),
      ])
      ->toolbarActions([
        BulkActionGroup::make([
          DeleteBulkAction::make(),
        ]),
      ]);
  }
}
