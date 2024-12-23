<?php

namespace App\Filament\Resources\SubServiceResource\Pages;

use App\Filament\Resources\SubServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubService extends EditRecord
{
    protected static string $resource = SubServiceResource::class;

    use EditRecord\Concerns\Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
