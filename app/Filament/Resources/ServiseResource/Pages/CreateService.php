<?php

namespace App\Filament\Resources\ServiseResource\Pages;

use App\Filament\Resources\ServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateService extends CreateRecord
{
    protected static string $resource = ServiceResource::class;

    use CreateRecord\Concerns\Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
