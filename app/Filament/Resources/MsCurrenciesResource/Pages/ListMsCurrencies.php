<?php

namespace App\Filament\Resources\MsCurrenciesResource\Pages;

use App\Filament\Resources\MsCurrenciesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMsCurrencies extends ListRecords
{
    protected static string $resource = MsCurrenciesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
