<?php

namespace App\Filament\Resources\GestionAsociadoResource\RelationManagers;

use App\Models\Asociado;
use App\Models\CreditoLinea;
use App\Models\CreditoSolicitud;
use App\Models\Pagaduria;
use App\Models\Tasa;
use App\Models\Tercero;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Actions;
use Filament\Forms\Set;

class CreditoSolicitudesRelationManager extends RelationManager
{
    protected static string $relationship = 'creditoSolicitudes';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                /* Forms\Components\TextInput::make('asociado_id')
                    ->label('Nro de Identificacion del Cliente')
                    ->disabled(),
                Forms\Components\TextInput::make('nombre_cliente')
                    ->label('Nombre del Cliente')
                    ->required()
                    ->maxLength(255), */
                Forms\Components\Select::make('linea')
                    ->label('Linea de credito')
                    ->searchable()
                    ->options(fn () => CreditoLinea::query()->pluck('descripcion', 'id'))
                    ->required(),
                Forms\Components\Select::make('empresa')
                    ->label('Pagaduria')
                    ->required()
                    ->searchable()
                    ->options(fn () => Pagaduria::query()->pluck('nombre', 'id')),
                Forms\Components\Checkbox::make('tipo_desembolso')
                    ->label('Descuento nomina'),
                Forms\Components\Checkbox::make('tipo_desembolso')
                    ->label('Descuento ventanilla'),
                Forms\Components\TextInput::make('vlr_solicitud')
                    ->label('Valor Solicitud')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('nro_cuotas_max')
                    ->label('Plazo')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('nro_cuotas_gracia')
                    ->label('Cuota Gracia')
                    ->numeric()
                    ->required(),
                Forms\Components\DatePicker::make('fecha_primer_vto')
                    ->label('Fecha cuota 1')
                    ->required()
                    ->native(false)
                    ->displayFormat('d/m/Y')
                    ->minDate(now()),
                Forms\Components\Select::make('tasa_id')
                    ->label('Tasa interes')
                    ->required()
                    ->options(fn () => Tasa::query()->pluck('nombre', 'id'))
                    ->searchable()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('nombre')
                            ->label('Nombre de la tasa')
                            ->required()
                            ->columns(2),
                        Forms\Components\TextInput::make('tasa')
                            ->label('Valor de la tasa')
                            ->numeric()
                            ->required()
                            ->columns(2),
                    ])
                    ->createOptionUsing(function (array $data): int {
                        return Tasa::create($data)->id;
                    }),
                Forms\Components\Select::make('tercero_asesor')
                    ->label('Codigo Asesor')
                    ->searchable()
                    ->options(fn () => Tercero::query()->pluck('nombres', 'id'))
                    ->required(),
                Forms\Components\Textarea::make('observaciones')
                    ->label('Observaciones')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Actions::make([
                    Action::make('actualizar_datos')
                        ->label('Actualizar datos')
                        ->color('info')
                        ->action(function () {
                            //
                        }),
                    Action::make('garantia')
                        ->label('Garantias')
                        ->color('info')
                        ->action(function () {
                            //
                        }),
                    Action::make('analisis_cupo')
                        ->label('Analisis cupo')
                        ->color('info')
                        ->action(function () {
                            //
                        }),
                    Action::make('capacidad_endeudamiento')
                        ->label('Capacidad de endeudamiento')
                        ->color('info')
                        ->action(function () {
                            //
                        }),
                ])->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('observaciones')
            ->columns([
                Tables\Columns\TextColumn::make('asociado.codigo_interno_pag'),
                Tables\Columns\TextColumn::make('observaciones'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->slideOver()->label('Nueva solicitud de credito'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->slideOver(),
                //Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
