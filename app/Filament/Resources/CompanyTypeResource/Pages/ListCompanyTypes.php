<?php

namespace App\Filament\Resources\CompanyTypeResource\Pages;

use App\Filament\Resources\CompanyTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListCompanyTypes extends ListRecords
{
    protected static string $resource = CompanyTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

//    public function getTableQuery(): \Illuminate\Database\Eloquent\Builder
//    {
//        $user = Auth::user();
//
//        // Admin users can see all companies
//        if ($user->hasRole('Super-Admin')) {
//            return parent::getTableQuery();
//        }
//
//        // Non-admin users see only their own records
//        return parent::getTableQuery()->where('user_id', $user->id);
//    }
}
