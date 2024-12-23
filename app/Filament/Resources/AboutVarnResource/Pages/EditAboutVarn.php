<?php

namespace App\Filament\Resources\AboutVarnResource\Pages;

use App\Filament\Resources\AboutVarnResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAboutVarn extends EditRecord
{
    protected static string $resource = AboutVarnResource::class;
    use EditRecord\Concerns\Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
