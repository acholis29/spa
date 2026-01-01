<?php

namespace App\Filament\Resources\MsCatalogsResource\Pages;

use App\Filament\Resources\MsCatalogsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMsCatalogs extends ListRecords
{
    protected static string $resource = MsCatalogsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
