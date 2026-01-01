<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MsCurrenciesResource\Pages;
use App\Filament\Resources\MsCurrenciesResource\RelationManagers;
use App\Models\MsCurrencies;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class MsCurrenciesResource extends Resource
{
    protected static ?string $model = MsCurrencies::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationGroup = 'Master Database';
    protected static ?string $modelLabel = 'Currencies';
    protected static ?string $slug = 'mscurrencies';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('code')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->dehydrateStateUsing(fn(string $state): string => Str::upper($state))
                    ->maxLength(3),
                Forms\Components\TextInput::make('name')
                    ->dehydrateStateUsing(fn(string $state): string => Str::upper($state))
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_default')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_default')
                    ->boolean(),

            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\EditAction::make(),
                ]),
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
            'index' => Pages\ListMsCurrencies::route('/'),
            // 'create' => Pages\CreateMsCurrencies::route('/create'),
            // 'view' => Pages\ViewMsCurrencies::route('/{record}'),
            // 'edit' => Pages\EditMsCurrencies::route('/{record}/edit'),
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
