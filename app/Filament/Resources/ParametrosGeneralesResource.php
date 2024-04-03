<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParametrosGeneralesResource\Pages;
use App\Filament\Resources\ParametrosGeneralesResource\RelationManagers;
use App\Models\ParametrosGenerales;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ParametrosGeneralesResource extends Resource
{
    protected static ?string $model = ParametrosGenerales::class;

    protected static ?string    $navigationIcon = 'heroicon-o-arrows-right-left';
    protected static ?string    $navigationLabel = 'Parametros Generales';
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListParametrosGenerales::route('/'),
            'create' => Pages\CreateParametrosGenerales::route('/create'),
            'view' => Pages\ViewParametrosGenerales::route('/{record}'),
            'edit' => Pages\EditParametrosGenerales::route('/{record}/edit'),
        ];
    }
}
