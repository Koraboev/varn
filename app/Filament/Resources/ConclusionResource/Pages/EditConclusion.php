<?php

namespace App\Filament\Resources\ConclusionResource\Pages;

use App\Filament\Resources\ConclusionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConclusion extends EditRecord
{
    protected static string $resource = ConclusionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
