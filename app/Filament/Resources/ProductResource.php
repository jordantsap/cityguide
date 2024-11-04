<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Variant;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationGroup = "Company Management";

    protected static ?int $navigationSort = 5;

//    protected static bool $shouldSkipAuthorization = true;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (string $operation, string $state,Forms\Set $set) {
                        if ($operation === 'edit') {
                            return;
                        }
                        $set('slug', Str::slug($state));
                    }),
                TextInput::make('slug'),
                Hidden::make('user_id')
                    ->default(auth()->id()),
                TextInput::make('sku'),
                TextInput::make('price'),
                TextInput::make('description'),
                TextInput::make('quantity'),
                Select::make('company_id')
                    ->label('Company')
                    ->options(Company::where('user_id', Auth::id())->pluck('name', 'id'))
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('product_type_id')
                    ->label('Product Type')
                    ->options(ProductType::all()->pluck('name', 'id'))
                    ->live() // Makes this component reactive to trigger dependent fields
                    ->searchable()
                    ->afterStateUpdated(function (string $operation, string $state,Forms\Set $set) {
                        $set('variant_id',null);
                    })
                    ->required(), // Ensure this component triggers reactivity on change

                Forms\Components\Select::make('variant_id')
                    ->label('Variants')
                    ->multiple() // Allow selecting multiple variants
                    ->relationship('variants', 'name') // Define the many-to-many relationship to the Variant model
                    ->preload()
                    ->searchable()
                    ->reactive() // Ensures reactivity to dynamically load options
                    ->options(function (callable $get) {
                        // Get the selected product_type_id value
                        $productTypeId = $get('product_type_id');

                        // If a product type is selected, filter the variants by the selected ProductType
                        return $productTypeId
                            ? Variant::whereHas('productTypes', function ($query) use ($productTypeId) {
                                $query->where('product_types.id', $productTypeId); // Specify 'product_types.id' to avoid ambiguity
                            })->pluck('name', 'id')
                            : []; // Return an empty array if no product type is selected
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('slug'),
                TextColumn::make('user.name'),
                TextColumn::make('sku'),
                TextColumn::make('price')
                    ->sortable()
                    ->searchable(),
//                TextColumn::make('description'),
                TextColumn::make('quantity'),
                TextColumn::make('company.name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('productType.name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('variants.name')
                    ->sortable()
                    ->searchable()
                    ->limit(10),
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
//                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

//    public static function getNavigationBadge(): ?string
//    {
//        return static::getModel()::count();
//    }
}
