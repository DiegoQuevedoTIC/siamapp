<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParametrosAsociadoResource\Pages;
use App\Filament\Resources\ParametrosAsociadoResource\RelationManagers;
use App\Models\ParametrosAsociado;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PagaduriaResource;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ParametrosAsociadoResource extends Resource
{
    protected static ?string $model = ParametrosAsociado::class;

    protected static ?string    $navigationIcon = 'heroicon-o-arrow-trending-up';
    protected static ?string    $navigationLabel = 'Parametros Asociados';
    protected static ?string    $navigationGroup = 'Parametros';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
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
                Tables\Actions\ViewAction::make(),
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
            
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListParametrosAsociados::route('/'),
            'create' => Pages\CreateParametrosAsociado::route('/create'),
            'view' => Pages\ViewParametrosAsociado::route('/{record}'),
            'edit' => Pages\EditParametrosAsociado::route('/{record}/edit'),
        ];
    }
}
