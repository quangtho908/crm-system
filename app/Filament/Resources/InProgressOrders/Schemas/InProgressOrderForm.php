<?php

namespace App\Filament\Resources\InProgressOrders\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class InProgressOrderForm
{
  public static function configure(Schema $schema): Schema
  {
    return $schema
      ->components([
        TextInput::make('email')
          ->label('Email')
          ->email()
          ->default(null),
        TextInput::make('full_name')
          ->label("Họ tên")
          ->default(null),
        TextInput::make('phone')
          ->label("Số điện thoại")
          ->tel()
          ->default(null),
        Textarea::make('address')
          ->label("Địa chỉ")
          ->default(null)
          ->columnSpanFull(),
        TextInput::make('country_name')
          ->label("Quốc gia")
          ->default(null),
        TextInput::make('state_name')
          ->label("Tỉnh/Thành phố")
          ->default(null),
        TextInput::make('district_name')
          ->label("Quận/Huyện")
          ->default(null),
        TextInput::make('ward_name')
          ->label("Phường/Xã")
          ->default(null),
        TextInput::make('date_of_birth')
          ->label("Ngày sinh"),
        Textarea::make('school')
          ->label("Trường học")
          ->default(null)
          ->columnSpanFull(),
        TextInput::make('grade')
          ->label("Khối lớp")
          ->default(null),
        TextInput::make('class')
          ->label("Lớp học")
          ->default(null),
        TextInput::make('parents_name')
          ->label("Họ tên phụ huynh")
          ->default(null),
        Textarea::make('achievement')
          ->label("Thành tích")
          ->default(null)
          ->columnSpanFull(),
        Textarea::make('product_name')
          ->label("Cuộc thi - gói")
          ->default(null)
          ->columnSpanFull(),
        TextInput::make('price')
          ->label("Phí cuộc thi")
          ->required()
          ->numeric()
          ->default(0),
        TextInput::make('total')
          ->label("Tiền cần thanh toán")
          ->required()
          ->numeric()
          ->default(0.0),
        Textarea::make('note')
          ->label("Ghi chú")
          ->default(null)
          ->columnSpanFull(),
      ]);
  }
}
