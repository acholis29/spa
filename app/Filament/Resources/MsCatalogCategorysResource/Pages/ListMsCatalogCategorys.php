<?php

namespace App\Filament\Resources\MsCatalogCategorysResource\Pages;

use App\Filament\Resources\MsCatalogCategorysResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMsCatalogCategorys extends ListRecords
{
    protected static string $resource = MsCatalogCategorysResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
