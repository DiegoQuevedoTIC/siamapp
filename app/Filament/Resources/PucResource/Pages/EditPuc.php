<?php

namespace App\Filament\Resources\PucResource\Pages;

use App\Filament\Resources\PucResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditPuc extends EditRecord
{
    protected static string $resource = PucResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }


    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }


    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Cuenta PUC Actualizada')
            ->body('La Cuenta del PUC se ha actualizado de manera correcta');
    }

}
