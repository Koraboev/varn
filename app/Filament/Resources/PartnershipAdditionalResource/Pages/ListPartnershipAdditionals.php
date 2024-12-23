<?php

namespace App\Filament\Resources\PartnershipAdditionalResource\Pages;

use App\Filament\Resources\PartnershipAdditionalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPartnershipAdditionals extends ListRecords
{

    protected static string $resource = PartnershipAdditionalResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),

        ];
    }
}
