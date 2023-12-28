<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActividadEconomicaResource\Pages;
use App\Filament\Resources\ActividadEconomicaResource\RelationManagers;
use App\Models\ActividadEconomica;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActividadEconomicaResource extends Resource
{
    protected static ?string    $model = ActividadEconomica::class;
    protected static ?string    $navigationIcon = 'heroicon-o-archive-box-arrow-down';
    protected static ?string    $navigationLabel = 'Actividades_Economicas';
    protected static ?string    $navigationGroup = 'Parametros';
    protected static ?string    $navigationParentItem = 'Parametros Asociados';   

                                


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('codigo')
                ->required()
                ->maxLength(4),
            Forms\Components\TextInput::make('nombre')
                ->required()
                ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageActividadEconomicas::route('/'),
        ];
    }    
}
