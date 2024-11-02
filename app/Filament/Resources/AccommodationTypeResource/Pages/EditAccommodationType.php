<?php

namespace App\Filament\Resources\AccommodationTypeResource\Pages;

use App\Filament\Resources\AccommodationTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAccommodationType extends EditRecord
{
    protected static string $resource = AccommodationTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
