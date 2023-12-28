<?php

namespace App\Filament\Resources\PucResource\Pages;

use App\Filament\Resources\PucResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreatePuc extends CreateRecord
{
    protected static string $resource = PucResource::class;



    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Cuenta PUC Registrada OK.')
            ->body('La Cuenta PUC se ha creado de manera correcta');
    }


}
