<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\RelationManagers\FieldsRelationManager;
use App\Filament\Resources\FieldResource\Pages;
use App\Filament\Resources\FieldResource\RelationManagers;
use App\Models\Field;
use App\Models\FieldType;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class FieldResource extends Resource
{
    protected static ?string $model = Field::class;

    protected static bool $shouldSkipAuthorization = true;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (string $operation, string $state,Forms\Set $set) {
                        if ($operation === 'edit') {
                            return;
                        }
                        $set('slug', Str::slug($state));
                    }),
                Select::make('field_type_id')
                    ->label('Field Type')
//                    ->options(FieldType::all()->pluck('title', 'id'))
                    ->relationship('fieldType', 'name')
                    ->searchable()
                    ->preload(),
                TextInput::make('name'),
                TextInput::make('placeholder'),
                Select::make('multiple')
                    ->options([
                        'yes' => 'yes',
                        'no' => 'no',
                    ])
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->limit(20),
                TextColumn::make('fieldType.name')->limit(20),
                TextColumn::make('name'),
                TextColumn::make('placeholder'),
                TextColumn::make('multiple'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\CategoriesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFields::route('/'),
            'create' => Pages\CreateField::route('/create'),
            'edit' => Pages\EditField::route('/{record}/edit'),
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}