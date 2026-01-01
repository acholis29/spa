<?php

namespace App\Filament\Resources\MsCatalogsResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
    use Filament\Forms\Components\FileUpload;



class MsCatalogImagesRelationManager extends RelationManager
{
    protected static string $relationship = 'CatalogImages';
    protected static ?string $modelLabel = 'Images';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(255), 
                FileUpload::make('catalog_images')
                    ->required()
                ->disk('public') // Optional: specify the storage disk (e.g., 's3', 'local')
                ->directory('catalog') // Specify the target folder within the disk
                ->image()
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('description')
                    ->label('Description'),
                    
                ImageColumn::make('catalog_images')
                    ->disk('public')
                    
                    ->label('Image')
                    ->rounded(),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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

     
}
