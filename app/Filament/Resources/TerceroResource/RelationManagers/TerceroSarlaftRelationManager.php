<?php

namespace App\Filament\Resources\TerceroResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use App\Models\Tercero;
use App\Models\Parentesco;
use App\Models\Moneda;
use App\Models\Pais;
use Illuminate\Support\Collection;
use Filament\Resources\Resource;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Get;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Set;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Tabs;

class TerceroSarlaftRelationManager extends RelationManager
{
    protected static string $relationship = 'TerceroSarlaft';

    public function form(Form $form): Form
    {
        return $form
            ->columns(5)   
            ->schema([
                Toggle::make('reconocimiento_publico')
                ->required()
                ->markAsRequired(false)
                ->columnSpan(2),
                TextInput::make('descripcion_reconocimiento')
                ->markAsRequired(false)
                ->columnSpan(3),
                Toggle::make('ejerce_cargos_publicos')
                ->required()
                ->markAsRequired(false)
                ->columnSpan(2),
                TextInput::make('descripcion_cargo_publico')
                ->markAsRequired(false)
                ->columnSpan(3),
                Toggle::make('familiar_peps')
                ->required()
                ->markAsRequired(false)
                ->columnSpan(2),
                Select::make('parentesco_id')
                ->columnSpan(2)
                ->placeholder('')
                ->relationship('parentesco', 'nombre'),
                TextInput::make('peps_id')
                ->markAsRequired(false)
                ->columnSpan(1),
                Toggle::make('socio_peps')
                ->required()
                ->markAsRequired(false)
                ->columnSpan(2),
                TextInput::make('nombre_peps')
                ->markAsRequired(false)
                ->columnSpan(3),
                Toggle::make('operacion_moneda_extranjera')
                ->required()
                ->markAsRequired(false)
                ->columnSpan(2),
                Select::make('pais_id')
                ->columnSpan(2)
                ->placeholder('')
                ->relationship('pais', 'nombre'),
                Select::make('moneda_id')
                ->columnSpan(1)
                ->placeholder('')
                ->relationship('moneda', 'nombre'),
                TextInput::make('producto_moneda_extranjera')
                ->columnSpan(2)
                ->markAsRequired(false),
                TextInput::make('tipo_producto_moneda_extranjera')
                ->markAsRequired(false)
                ->columnSpan(2),
                TextInput::make('monto_inicial')
                ->markAsRequired(false)
                ->columnSpan(2),
                TextInput::make('monto_final')
                ->markAsRequired(false)
                ->columnSpan(2),
                Toggle::make('declara_renta')
                ->required()
                ->label('Declarante Renta')
                ->markAsRequired(false)
                ->columnSpan(1),
                Textarea::make('origen_fondos')
                ->maxLength(65535)
                ->markAsRequired(false)
                ->required()
                ->columnSpanFull(),

            ]);
    
            
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tercero.tercero_id')
                ->label('Identificacion'),
                Tables\Columns\TextColumn::make('tercero.nombres')
                ->label('Nombres'),
                Tables\Columns\TextColumn::make('tercero.primer_apellido')
                ->label('Primer Apellido'),
                Tables\Columns\TextColumn::make('tercero.segundo_apellido')
                ->label('Segundo Apellido'),
                Tables\Columns\TextColumn::make('updated_at')
                ->label('Ultima Actualizacion'),
            ])
            ->filters([
                
            ])
            ->headerActions([
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->label('Actualizar Informacion'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
}
