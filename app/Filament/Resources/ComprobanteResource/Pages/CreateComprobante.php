<?php

namespace App\Filament\Resources\ComprobanteResource\Pages;

use App\Filament\Resources\ComprobanteResource;
use Filament\Notifications\Livewire\Notifications;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateComprobante extends CreateRecord
{
    protected static string $resource = ComprobanteResource::class;

    protected function beforeCreate(): void
    {
        $data = $this->data;
        $credito = array();
        $debito = array();
        foreach ($data['detalle'] as $key => $value) {
            if ($value['debito'] == '') {
                $credito[] = floatval($value['credito']);
            } else {
                $debito[] = floatval($value['debito']);
            }
        }

        if ((array_sum($credito) - array_sum($debito)) != 0.0) {
            
            $this->halt();
        }
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
