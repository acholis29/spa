<?php

namespace App\Filament\Resources\MsCatalogCategorysResource\Pages;

use App\Filament\Resources\MsCatalogCategorysResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMsCatalogCategorys extends ViewRecord
{
    protected static string $resource = MsCatalogCategorysResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
