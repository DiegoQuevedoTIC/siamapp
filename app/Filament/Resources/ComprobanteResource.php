<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComprobanteResource\Pages;
use App\Models\Comprobante;
use App\Models\Puc;
use App\Models\TipoDocumentoContable;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
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
        return $form
            ->schema([
                //
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
                    ->label('Tercero Comprobante'),

                TextColumn::make('clase_comprobante_origen')
                    ->label('Clase comprobante origen'),

            ])
            ->filters([
                //
                Filter::make('is_plantilla')
                    ->label('Mostrar solo las plantillas')
                    ->toggle()
                    ->default(false),

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
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', ">=", $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', "<=", $date),
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('is_plantilla', false);
    }
}
