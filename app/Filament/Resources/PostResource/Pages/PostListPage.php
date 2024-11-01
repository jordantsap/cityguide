<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Models\Post;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class PostListPage extends ListRecords implements HasForms
{
    use InteractsWithForms;

    protected static ?string $model = Post::class;

    protected static string $resource = PostResource::class;

    protected static string $view = 'filament.pages.posts.index';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    private mixed $post;

    public function getRecords()
    {
        // Fetch all records from the Post model
        global $user;
        return Post::where('user_id',auth()->user())->paginate() || $user->hasRole('Super-Admin');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Post::query())
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('body'),
                TextColumn::make('created_at'),
                TextColumn::make('user.name'),

            ])
            ->filters([])
            ->actions([
                EditAction::make()
                ->slideOver(),
                DeleteAction::make()
            ])
            ->bulkActions([]);
    }
}
