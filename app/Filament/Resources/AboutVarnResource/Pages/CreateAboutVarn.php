<?php

namespace App\Filament\Resources\AboutVarnResource\Pages;

use App\Filament\Resources\AboutVarnResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAboutVarn extends CreateRecord
{
    protected static string $resource = AboutVarnResource::class;
    use CreateRecord\Concerns\Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
