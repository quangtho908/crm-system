<?php

namespace App\Filament\Pages;

use App\Models\Settings;
use App\Models\WebsitePage;
use Filament\Actions\Action;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Log;

class Setting extends Page
{
  protected string $view = 'filament.pages.setting';

  /**
   * @var array<string, mixed> | null
   */
  public ?array $data = [];

  public function mount(): void
  {
    $this->form->fill($this->getRecord()?->attributesToArray());
  }


  public function form(Schema $schema): Schema
  {
    return $schema
      ->components([
        Form::make([
          TextInput::make('prefix_payment_ladipage')
            ->maxLength(255),
          TextInput::make('webhook_payment_ladipage'),
          TextInput::make('x_api_key')
        ])
          ->livewireSubmitHandler('save')
          ->footer([
            Actions::make([
              Action::make('save')
                ->submit('save')
                ->keyBindings(['mod+s']),
            ]),
          ]),
      ])
      ->record($this->getRecord())
      ->statePath('data');
  }

  public function save(): void
  {
    $data = $this->form->getState();

    $record = $this->getRecord();

    if (! $record) {
      $record = new Settings();
    }

    $record->fill($data);
    $record->save();

    if ($record->wasRecentlyCreated) {
      $this->form->record($record)->saveRelationships();
    }

    Notification::make()
      ->success()
      ->title('Saved')
      ->send();
  }

  public function getRecord(): ?Settings
  {
    return Settings::query()->first();
  }
}
