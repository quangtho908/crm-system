<?php

namespace App\Filament\Resources\DoneOrders\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class DoneOrderForm
{
  public static function configure(Schema $schema): Schema
  {
    return $schema
      ->components([
        Textarea::make('order_id')
          ->required()
          ->columnSpanFull(),
        TextInput::make('email')
          ->label('Email address')
          ->email()
          ->default(null),
        TextInput::make('full_name')
          ->default(null),
        TextInput::make('phone')
          ->tel()
          ->default(null),
        Textarea::make('address')
          ->default(null)
          ->columnSpanFull(),
        TextInput::make('country_name')
          ->default(null),
        TextInput::make('state_name')
          ->default(null),
        TextInput::make('district_name')
          ->default(null),
        TextInput::make('ward_name')
          ->default(null),
        TextInput::make('date_of_birth'),
        Textarea::make('school')
          ->default(null)
          ->columnSpanFull(),
        TextInput::make('grade')
          ->default(null),
        TextInput::make('class')
          ->default(null),
        TextInput::make('parents_name')
          ->default(null),
        Textarea::make('achievement')
          ->default(null)
          ->columnSpanFull(),
        Textarea::make('product_name')
          ->default(null)
          ->columnSpanFull(),
        TextInput::make('price')
          ->required()
          ->numeric()
          ->default(0.0)
          ->prefix('$'),
        TextInput::make('total')
          ->required()
          ->numeric()
          ->default(0.0),
        Textarea::make('note')
          ->default(null)
          ->columnSpanFull(),
        TextInput::make('bank')
          ->default(null),
        TextInput::make('transaction_date')
          ->default(null),
        TextInput::make('account_number')
          ->default(null),
        Textarea::make('content')
          ->required()
          ->columnSpanFull(),
      ]);
  }
}
