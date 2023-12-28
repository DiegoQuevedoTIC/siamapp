<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LenguajeResource\Pages;
use App\Filament\Resources\LenguajeResource\RelationManagers;
use App\Models\Lenguaje;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;


class LenguajeResource extends Resource
{
    protected static ?string $model = Lenguaje::class;

    protected static ?string    $navigationIcon = 'heroicon-o-language' ;
    protected static ?string    $navigationLabel = 'Idiomas' ;
    protected static ?string    $navigationGroup = 'Parametros';
    protected static ?string    $navigationParentItem = 'Parametros Generales'; 
    protected static ?string    $modelLabel = 'Idioma';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
                Tabs::make('Tabs')
                ->tabs([
                    Tabs\Tab::make('Creacion de Lenguaje')
                    ->icon('heroicon-m-bell')
    
                ->schema([
                    TextInput::make('codigo_iso')
                        ->required()
                        ->maxLength(3),        
                    TextInput::make('nombre')
                        ->required()
                        ->maxLength(255), 
                        ])
                    ])
                ]);
         
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('codigo_iso')
                ->searchable(),
            Tables\Columns\TextColumn::make('nombre')
                ->searchable(),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ManageLenguajes::route('/'),
        ];
    }    
}
