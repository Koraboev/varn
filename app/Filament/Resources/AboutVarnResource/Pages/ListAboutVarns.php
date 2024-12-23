<?php

namespace App\Filament\Resources\AboutVarnResource\Pages;

use App\Filament\Resources\AboutVarnResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAboutVarns extends ListRecords
{
    protected static string $resource = AboutVarnResource::class;
    use ListRecords\Concerns\Translatable;
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
