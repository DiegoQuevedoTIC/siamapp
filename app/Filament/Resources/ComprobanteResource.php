<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComprobanteResource\Pages;
use App\Filament\Resources\ComprobanteResource\Widgets\PlantillaComprobanteOverview;
use App\Models\Comprobante;
use App\Models\ParametrosTercero;
use App\Models\Puc;
use App\Models\TipoContribuyente;
use App\Models\TipoDocumentoContable;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Icetalker\FilamentTableRepeater\Forms\Components\TableRepeater;

class ComprobanteResource extends Resource
{
    protected static ?string $model = Comprobante::class;

    protected static ?string    $navigationIcon = 'heroicon-o-swatch';
    protected static ?string    $navigationLabel = 'Creacion Comprobantes';
    protected static ?string    $navigationGroup = 'Contabilidad';
    protected static ?string    $navigationParentItem = 'Procesos';
    //protected static ?string    $modelLabel = 'PUC - Cuenta';

    public static function form(Form $form): Form
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
        unset($query);
        $query = TipoContribuyente::all()->toArray();
        $terceroComprobante = array();
        foreach ($query as $row) {
            $terceroComprobante[$row['id']] = $row['nombre'];
        }
        return $form
            ->schema([
                //
                Toggle::make('usar_plantilla')
                ->label('Usar plantilla')
                ->live(),

                Select::make('plantilla')
                ->label('Plantilla')
                ->native(false)
                ->options(function (){
                    return Comprobante::where('is_plantilla', '=', true)->get()->pluck('descripcion_comprobante', 'id');
                })
                ->disabled(function (Get $get): bool {
                    if($get('usar_plantilla')){
                        return false;
                    }
                    else{
                        return true;
                    }
                }),

                Select::make('tipo_documento_contables_id')
                    ->label('Tipo de Documento')
                    ->native(false)
                    ->options($tipoDocumento)
                    ->required()
                    ->live(),

                TextInput::make('n_documento')
                    ->label('Nº de Documento')
                    ->required(),

                Select::make('tercero_id')
                    ->label('Tercero Comprobante')
                    ->required()
                    ->native(false)
                    ->options($terceroComprobante),

                DatePicker::make('fecha_comprobante')
                    ->label('Fecha de comprobante')
                    ->required()
                    ->native(false)
                    ->disabled(function (Get $get, Set $set): bool {
                        $id = $get('tipo_documento_contables_id');
                        if (!is_null($id)) {
                            $isDateModified = TipoDocumentoContable::all()->find($id)->toArray()['fecha_modificable'];
                            if ($isDateModified == 1) {
                                return false;
                            } else {
                                $set('fecha_comprobante', date('Y-m-d'));
                                return true;
                            }
                        }
                        else{
                            return false;
                        }
                    }),

                Toggle::make('is_plantilla')
                    ->label('¿Guardar como Plantilla?')
                    ->required(),

                Textarea::make('descripcion_comprobante')
                    ->label('Descripcion del Comprobante')
                    ->required(),

                TableRepeater::make('detalle')
                    ->label('Detalle comprobante')
                    ->relationship('comprobanteLinea')
                    ->schema([
                        Select::make('pucs_id')
                            ->label('Cuenta PUC')
                            ->options($puc),

                        Select::make('tercero_id')
                            ->label('Tercero Registro')
                            ,

                        TextInput::make('descripcion_linea')
                            ->label('Descripcion Linea'),

                        TextInput::make('debito')
                            ->placeholder('Debito')
                            ->mask(RawJs::make('$money($input)'))
                            ->numeric()
                            ->prefix('$'),

                        TextInput::make('credito')
                            ->placeholder('Credito')
                            ->numeric()
                            ->inputMode('decimal')
                            ->prefix('$'),
                    ])
                    ->reorderable()
                    ->cloneable()
                    ->collapsible()
                    ->defaultItems(1)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id')
                    ->label('Nº'),

                TextColumn::make('tipo_documento_contables_id')
                    ->label('Tipo de Documento Contable')
                    ->formatStateUsing(fn (string $state): string => TipoDocumentoContable::all()->find($state)['tipo_documento']),

                TextColumn::make('n_documento')
                    ->label('Nº de documento'),

                TextColumn::make('tercero_comprobante')
                    ->label('Tercero Comprobante')
                    ->formatStateUsing(fn (string $state): string => TipoContribuyente::all()->find($state)['nombre']),

                TextColumn::make('clase_comprobante_origen')
                    ->label('Clase comprobante origen'),
            ])
            ->filters([
                //
                Filter::make('created_at')->form([
                    DatePicker::make('created_from')
                        ->label('Creado desde')
                        ->native(false),
                    DatePicker::make('created_until')
                        ->label('Creado hasta')
                        ->native(false)
                ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('fecha_comprobante', ">=", $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('fecha_comprobante', "<=", $date),
                            );
                    })
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Ver comprobante'),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                /*Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ])*/])
            ->emptyStateHeading('Sin comprobantes');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComprobantes::route('/'),
            'create' => Pages\CreateComprobante::route('/create'),
            'edit' => Pages\EditComprobante::route('/{record}/edit'),
        ];
    }

    
}
