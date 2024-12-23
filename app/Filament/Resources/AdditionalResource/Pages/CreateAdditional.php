<?php

namespace App\Filament\Resources\AdditionalResource\Pages;

use App\Filament\Resources\AdditionalResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAdditional extends CreateRecord
{
    protected static string $resource = AdditionalResource::class;
    use CreateRecord\Concerns\Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
