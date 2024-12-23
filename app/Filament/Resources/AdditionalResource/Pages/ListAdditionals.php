<?php

namespace App\Filament\Resources\AdditionalResource\Pages;

use App\Filament\Resources\AdditionalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdditionals extends ListRecords
{
    protected static string $resource = AdditionalResource::class;

    use ListRecords\Concerns\Translatable;
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
