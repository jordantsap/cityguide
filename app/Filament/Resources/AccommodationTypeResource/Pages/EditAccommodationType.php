<?php

namespace App\Filament\Resources\AccommodationTypeResource\Pages;

use App\Filament\Resources\AccommodationTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAccommodationType extends EditRecord
{
    protected static string $resource = AccommodationTypeResource::class;

    use EditRecord\Concerns\Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),

        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
