<?php

namespace App\Filament\Resources\GestionAsociadoResource\Pages;

use App\Filament\Resources\GestionAsociadoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGestionAsociado extends EditRecord
{
    protected static string $resource = GestionAsociadoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
