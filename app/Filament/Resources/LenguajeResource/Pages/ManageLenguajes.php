<?php

namespace App\Filament\Resources\LenguajeResource\Pages;

use App\Filament\Resources\LenguajeResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageLenguajes extends ManageRecords
{
    protected static string $resource = LenguajeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
