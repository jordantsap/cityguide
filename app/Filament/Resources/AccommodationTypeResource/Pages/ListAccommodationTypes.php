<?php

namespace App\Filament\Resources\AccommodationTypeResource\Pages;

use App\Filament\Resources\AccommodationTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAccommodationTypes extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = AccommodationTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),

        ];
    }
}
