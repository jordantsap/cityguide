<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTableQuery(): ?\Illuminate\Database\Eloquent\Builder
    {
        $user = Auth::user();

        // Admin users can see all companies
        if ($user->hasAnyRole('Super-Admin')) {
            return parent::getTableQuery();
        }

        // Non-admin users see only their own records
        return parent::getTableQuery()->where('user_id', $user->id);
    }
}
