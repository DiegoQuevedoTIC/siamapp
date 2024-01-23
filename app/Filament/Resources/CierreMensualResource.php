<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CierreMensualResource\Pages;
use App\Filament\Resources\CierreMensualResource\RelationManagers;
use App\Models\CierreMensual;
use App\Models\Puc;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Icetalker\FilamentTableRepeater\Forms\Components\TableRepeater;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class CierreMensualResource extends Resource
{
    protected static ?string $model = CierreMensual::class;

    protected static ?string    $navigationIcon = 'heroicon-o-swatch';
    protected static ?string    $navigationLabel = 'Cierre mensual';
    protected static ?string    $navigationGroup = 'Contabilidad';
    protected static ?string    $navigationParentItem = 'Procesos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Section::make()
                    ->schema([
                        DatePicker::make('fecha_cierre')
                            ->label('Fecha Cierre')
                            ->displayFormat('d/m/Y')
                            ->format('Y-m-d')
                            ->native(false),
                        Select::make('mes_cierre')
                            ->label('Mes Cierre')
                            ->searchable()
                            ->native(false)
                            ->options([
                                'Enero',
                                'Febrero',
                                'Marzo',
                                'Abril',
                                'Mayo',
                                'Junio',
                                'Julio',
                                'Agosto',
                                'Septiembre',
                                'Octubre',
                                'Noviembre',
                                'Diciembre'
                            ]),
                    ])
                    ->label('Datos principales')
                    ->description('Seleccione el mes y del la fecha de cierre, recuerde que un mes cerrado no puede cerrarse de nuevo')
                    ->columns(2),
                Section::make()
                    ->schema([
                        TableRepeater::make('detalles')
                            ->relationship('detalles')
                            ->cloneable()
                            ->collapsible()
                            ->defaultItems(1)
                            ->columnSpan('full')
                            ->schema([
                                Select::make('pucs_id')
                                    ->native(false)
                                    ->label('Cuenta PUC')
                                    ->searchable()
                                    ->preload()
                                    ->options(Puc::all()->pluck('puc', 'id')->toArray())
                                    ->live(),

                                TextInput::make('saldo_anterior')
                                    ->label('Saldo anterior')
                                    ->default(0.00),

                                TextInput::make('debito')
                                    ->label('Debito')
                                    ->default(0.00),
                                TextInput::make('credito')
                                    ->label('Credito')
                                    ->default(0.00),
                                TextInput::make('saldo_actual')
                                    ->label('Saldo Actual')
                                    ->default(0.00)
                            ])
                    ])
                    ->label('Detalles')
                    ->description('Seleccione las cuentas para realizar el cierre')

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListCierreMensuals::route('/'),
            'create' => Pages\CreateCierreMensual::route('/create'),
            //'edit' => Pages\EditCierreMensual::route('/{record}/edit'),
        ];
    }
}
