<?php

namespace App\Filament\Resources\RoomsResource\Pages;

use App\Filament\Resources\RoomsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListRooms extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = RoomsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }

    public function getTableQuery(): ?\Illuminate\Database\Eloquent\Builder
    {
        $user = Auth::user();

        // Admin users can see all companies
        if ($user->hasRole('Super-Admin')) {
            return parent::getTableQuery();
        }

        // Non-admin users see only their own records
        return parent::getTableQuery()->where('user_id', $user->id);
    }
}
