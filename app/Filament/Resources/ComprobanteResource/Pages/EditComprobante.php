<?php

namespace App\Filament\Resources\ComprobanteResource\Pages;

use App\Filament\Resources\ComprobanteResource;
use Filament\Actions;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use App\Models\TipoDocumentoContable;
use App\Models\Puc;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Icetalker\FilamentTableRepeater\Forms\Components\TableRepeater;

class EditComprobante extends EditRecord
{
    protected static string $resource = ComprobanteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\DeleteAction::make(),
            Actions\CreateAction::make(),
        ];
    }

    public function form(Form $form): Form
    {
        $query = TipoDocumentoContable::all()->toArray();
        $tipoDocumento = array();
        foreach ($query as $row) {
            $tipoDocumento[$row['id']] = "{$row['sigla']} - {$row['tipo_documento']}";
        }
        unset($query);
        $query = Puc::all()->toArray();
        $puc = array();
        foreach ($query as $row) {
            $puc[$row['id']] = "{$row['puc']} - {$row['descripcion']}";
        }
        return $form->schema([
            Select::make('tipo_documento_contables_id')
                ->label('Tipo de Documento')
                ->native(false)
                ->options($tipoDocumento)
                ->required(),

            TextInput::make('n_documento')
                ->label('Nº de Documento')
                ->required(),

            TextInput::make('tercero_comprobante')
                ->label('Tercero Comprobante')
                ->required(),

            Toggle::make('is_plantilla')
                ->label('¿Guardar como Plantilla?')
                ->live()
                ->required(),

            Textarea::make('descripcion_comprobante')
                ->label('Descripcion del Comprobante')
                ->required(),

            Select::make('clase_comprobante_origen')
                ->label('Clase Comprobante Origen')
                ->options([
                    1 => 'Ejemplo de comprobante origen'
                ])
                ->required(),

            TableRepeater::make('detalle')
                ->label('Detalle comprobante')
                ->schema([
                    Select::make('pucs_id')
                        ->label('Cuenta PUC')
                        ->options($puc),

                    TextInput::make('tercero_registro')
                        ->label('Tercero Registro'),

                    TextInput::make('descripcion_linea')
                        ->label('Descripcion Linea'),

                    TextInput::make('debito')
                        ->placeholder('Debito'),

                    TextInput::make('credito')
                        ->placeholder('Credito'),
                ])
                ->relationship('comprobanteLinea')
                ->reorderable()
                ->cloneable()
                ->collapsible()
                ->defaultItems(1)
                ->columnSpanFull(),

        ]);
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
