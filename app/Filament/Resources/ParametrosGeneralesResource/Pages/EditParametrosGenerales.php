<?php

namespace App\Filament\Resources\ParametrosGeneralesResource\Pages;

use App\Filament\Resources\ParametrosGeneralesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditParametrosGenerales extends EditRecord
{
    protected static string $resource = ParametrosGeneralesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
