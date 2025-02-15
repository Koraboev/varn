<?php

namespace App\Filament\Resources\SubServiceResource\Pages;

use App\Filament\Resources\SubServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubServices extends ListRecords
{
    protected static string $resource = SubServiceResource::class;
    use ListRecords\Concerns\Translatable;
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
