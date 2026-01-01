<?php

namespace App\Filament\Resources\MsCatalogsResource\Pages;

use App\Filament\Resources\MsCatalogsResource;
use Filament\Actions;
use Filament\Infolists\Components\Group;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\Split;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Support\Enums\FontWeight;

class ViewMsCatalogs extends ViewRecord
{
    protected static string $resource = MsCatalogsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([

                Split::make([
                    Group::make([
                        Section::make([
                            
                            TextEntry::make('name')
                                ->label('Name')
                                ->color('danger')
                                ->size('lg')
                                ->weight(FontWeight::Bold),

                        ])->grow(true),
                                            Section::make([

                            TextEntry::make('description')
                                ->html('Description')
                                ->markdown()
                                ->prose(),
                        ]),
                    ]),

                    Section::make([
                        Grid::make(3)
                            ->schema([
                                TextEntry::make('sku')->label('SKU'),
                                TextEntry::make('mscurrencies.code')->label('Currency'),
                                TextEntry::make('price')->label('Price'),
                            ]),
                            Grid::make(3)
                            ->schema([
                                TextEntry::make('minstock')->label('Min. Stock'),
                                TextEntry::make('maxstock')->label('Max. Stock'),
                                TextEntry::make('stock')->label('Stock'),
                            ]),

                    ])->grow(true),
                ])->columnSpanFull()
                
                

                


            ]);

            RepeatableEntry::make('CatalogImages')
                ->schema([
                    TextEntry::make('description'),
                    TextEntry::make('catalog_images')->image(),                   
                ]);
    }
}
