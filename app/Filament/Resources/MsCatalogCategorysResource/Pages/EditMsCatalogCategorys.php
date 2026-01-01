<?php

namespace App\Filament\Resources\MsCatalogCategorysResource\Pages;

use App\Filament\Resources\MsCatalogCategorysResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMsCatalogCategorys extends EditRecord
{
    protected static string $resource = MsCatalogCategorysResource::class;

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
