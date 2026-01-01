<?php

namespace App\Filament\Resources\MsCatalogsResource\Pages;

use App\Filament\Resources\MsCatalogsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMsCatalogs extends EditRecord
{
    protected static string $resource = MsCatalogsResource::class;

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
