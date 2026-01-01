<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MsCatalogsResource\Pages;
use App\Filament\Resources\MsCatalogsResource\RelationManagers;
use App\Filament\Resources\MsActivitiesResource\RelationManagers\MsCatalogImagesRelationManager;
use App\Models\MsCurrencies;
use App\Models\MsCatalogs;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Tables\Actions\ActionGroup;


class MsCatalogsResource extends Resource
{
    protected static ?string $model = MsCatalogs::class;


    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationGroup = 'Catalogs';
    protected static ?string $modelLabel = 'Catalogs';
    protected static ?string $slug = 'mscatalogs';


    public static function form(Form $form): Form
    {
        $appid = env('APP_ID', 'IDD');
        $currcode = MsCurrencies::where('id', 'mscurrencies_id')->first()?->code ?? 'IDR';
        
        return $form
            ->schema([
                Section::make('Catalog Information')
                    ->schema([
                        TextInput::make('sku')
                                ->label('SKU')
                                ->default(fn() => 'I' . $appid . date('ym') .  rand(10000, 99999))
                                ->required()
                                ->maxLength(255),
                            Select::make('msCatalog_categorys_id')
                                ->relationship('mscatalogCategorys', 'name',  fn($query) => $query->where('is_active', true))
                                ->label('Categorys')
                                ->searchable()
                                ->preload(),
                            Select::make('msCatalog_groups_id')
                                ->relationship('mscatalogGroups', 'name',  fn($query) => $query->where('is_active', true))
                                ->label('Groups')
                                ->searchable()
                                ->preload(),

                        TextInput::make('name')
                            ->required()
                            ->columnSpanFull()
                            ->maxLength(255),

                        RichEditor::make('description')
                            ->label('Description')
                            ->columnSpanFull(),
                
                        TextInput::make('duration')
                                ->required()
                                ->label('Duration (minutes)')
                                ->numeric()
                                ->default(60),
                        
                        Toggle::make('is_priority')
                            ->label('Priority')
                            ->required(),
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->required(),

                ])->columnSpan(2)->columns(3)->collapsible(),

                Section::make('Price & Stock')
                    ->schema([
                        Select::make('mscurrencies_id')
                            ->relationship('mscurrencies', 'code',)
                            ->label('Currency')
                            ->searchable()
                            ->default(function () {
                                return MsCurrencies::where('is_default', true)->first()?->id; // Assuming 'Currency' is your model name
                            })->preload(),
                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->default(0.00),
                        TextInput::make('minstock')
                            ->required()
                            ->numeric()
                            ->default(1),
                        TextInput::make('maxstock')
                            ->required()
                            ->numeric()
                            ->default(1),
                        TextInput::make('stock')
                            ->required()
                            ->numeric()
                            ->default(999),
                        
                    ])->columnSpan(1)->columns(1)->collapsible()
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mscatalogCategorys.name')
                    ->label('Categorys')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mscatalogGroups.name')
                    ->label('Groups')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('duration')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('stock')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mscurrencies.code')
                    ->label('Currency')
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->numeric(true),
                Tables\Columns\IconColumn::make('is_priority')
                    ->label('Priority')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),

            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\RestoreAction::make(),
                    Tables\Actions\ForceDeleteAction::make(),

                ])->tooltip('Actions'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ])->tooltip('Bulk Actions'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\MsCatalogImagesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMsCatalogs::route('/'),
            'create' => Pages\CreateMsCatalogs::route('/create'),
            'view' => Pages\ViewMsCatalogs::route('/{record}'),
            'edit' => Pages\EditMsCatalogs::route('/{record}/edit'),
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
