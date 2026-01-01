<?php

namespace App\Filament\Resources\MsCatalogGroupsResource\Pages;

use App\Filament\Resources\MsCatalogGroupsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMsCatalogGroups extends ViewRecord
{
    protected static string $resource = MsCatalogGroupsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
