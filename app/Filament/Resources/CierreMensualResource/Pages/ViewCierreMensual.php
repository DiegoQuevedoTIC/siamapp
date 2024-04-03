<?php

namespace App\Filament\Resources\CierreMensualResource\Pages;

use App\Filament\Resources\CierreMensualResource;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\ViewRecord;
use Icetalker\FilamentTableRepeater\Forms\Components\TableRepeater;
use Filament\Forms\Components\Select;

class ViewCierreMensual extends ViewRecord
{
    protected static string $resource = CierreMensualResource::class;

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('mes_cierre')->label('Mes'),
            DatePicker::make('fecha_cierre')->label('Fecha del cierre')->format('d/m/Y'),
            TableRepeater::make('detalles')
            ->relationship('detalles')
            ->schema([
               Select::make('puc_id')->label('PUC'),
               TextInput::make('saldo_anterior')->label('Saldo Anterior'),
               TextInput::make('saldo_actual')->label('Saldo Actual'),
               TextInput::make('debito')->label('Débito'),
               TextInput::make('credito')->label('Crédito')
            ])
        ]);
    }

    

    
}
