<?php

namespace App\Filament\Resources\MsCatalogGroupsResource\Pages;

use App\Filament\Resources\MsCatalogGroupsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMsCatalogGroups extends ListRecords
{
    protected static string $resource = MsCatalogGroupsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
