<?php

namespace App\Filament\Resources\MsCurrenciesResource\Pages;

use App\Filament\Resources\MsCurrenciesResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMsCurrencies extends ViewRecord
{
    protected static string $resource = MsCurrenciesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
