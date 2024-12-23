<?php

namespace App\Filament\Resources\PartnershipAdditionalResource\Pages;

use App\Filament\Resources\PartnershipAdditionalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPartnershipAdditional extends EditRecord
{
    protected static string $resource = PartnershipAdditionalResource::class;



    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
