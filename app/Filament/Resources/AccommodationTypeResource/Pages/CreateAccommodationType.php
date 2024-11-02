<?php

namespace App\Filament\Resources\AccommodationTypeResource\Pages;

use App\Filament\Resources\AccommodationTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAccommodationType extends CreateRecord
{
    protected static string $resource = AccommodationTypeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
