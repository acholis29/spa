<?php

namespace App\Filament\Resources\MsCatalogGroupsResource\Pages;

use App\Filament\Resources\MsCatalogGroupsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMsCatalogGroups extends EditRecord
{
    protected static string $resource = MsCatalogGroupsResource::class;

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
