<?php

namespace App\Filament\Resources\ComprobanteResource\Pages;

use App\Filament\Resources\ComprobanteResource;
use App\Models\Comprobante;
use App\Models\ComprobanteLinea;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateComprobante extends CreateRecord
{
    protected static string $resource = ComprobanteResource::class;

    protected $detalle;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if($data['is_plantilla'])
        {
            unset($data['detalle']);
        }
        else{
            $this->detalle = $data['detalle'];
            unset($data['detalle']);
        }
        return $data;
    }

    protected function afterCreate(): void
    {
        $detalle = array();
        $comprobante_id = Comprobante::latest()->first()->id;
        if(!empty($this->detalle))
        {
            foreach($this->detalle as $key => $value)
            {
                if(is_null($value['pucs_id']))
                {
                    unset($this->detalle[$key]);
                }
                else{
                    $value['comprobante_id'] = $comprobante_id;
                }
            }
        }
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
