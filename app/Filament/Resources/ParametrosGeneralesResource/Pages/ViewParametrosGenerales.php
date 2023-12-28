<?php

namespace App\Filament\Resources\ParametrosGeneralesResource\Pages;

use App\Filament\Resources\ParametrosGeneralesResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewParametrosGenerales extends ViewRecord
{
    protected static string $resource = ParametrosGeneralesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
