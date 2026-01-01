<?php

namespace App\Filament\Resources\MsCurrenciesResource\Pages;

use App\Filament\Resources\MsCurrenciesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMsCurrencies extends EditRecord
{
    protected static string $resource = MsCurrenciesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
