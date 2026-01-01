<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MsCatalogCategorysResource\Pages;
use App\Filament\Resources\MsCatalogCategorysResource\RelationManagers;
use App\Models\MsCatalogCategorys;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class MsCatalogCategorysResource extends Resource
{
    protected static ?string $model = MsCatalogCategorys::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Catalogs';
    protected static ?string $navigationParentItem = 'Catalogs';
    protected static ?string $navigationLabel = 'Categorys';
    protected static ?string $modelLabel = 'Catalog Categorys';
    protected static ?string $slug = 'catalog-categorys';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->dehydrateStateUsing(fn(string $state): string => Str::upper($state))
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
               
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Active'),
                
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListMsCatalogCategorys::route('/'),
            // 'create' => Pages\CreateMsCatalogCategorys::route('/create'),
            // 'view' => Pages\ViewMsCatalogCategorys::route('/{record}'),
            // 'edit' => Pages\EditMsCatalogCategorys::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
