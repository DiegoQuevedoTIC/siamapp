<?php

namespace App\Filament\Resources\ParametrosGeneralesResource\Pages;

use App\Filament\Resources\ParametrosGeneralesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListParametrosGenerales extends ListRecords
{
    protected static string $resource = ParametrosGeneralesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
