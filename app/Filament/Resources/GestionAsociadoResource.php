<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GestionAsociadoResource\Pages;
use App\Filament\Resources\GestionAsociadoResource\RelationManagers;
use App\Models\Asociado;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;

class GestionAsociadoResource extends Resource
{
    protected static ?string $model = Asociado::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Administración Asociados';
    protected static ?string $navigationGroup = 'Gestión de Asociados';
    protected static ?string $modelLabel = 'Estado de cuenta Asociado';
    protected static ?string $pluralModelLabel = 'Estado de cuenta Asociado';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Section::make('Estado de cuenta Asociado')
                    ->columns([
                        'sm' => 3,
                        'xl' => 6,
                        '2xl' => 8,
                    ])
                    ->headerActions([
                        /* KeyValue::make('Fecha Consulta')
                            ->valueLabel('Property value'), */])
                    ->schema([
                        Forms\Components\Select::make('cliente')
                            ->label('Nro Identificacion asociado')
                            ->options(User::all()->pluck('name', 'id'))
                            ->searchable()
                            ->columnSpan([
                                'sm' => 1,
                                'xl' => 2,
                                '2xl' => 3,
                            ]),
                        Forms\Components\TextInput::make('nombre_cliente')
                            ->label('Nombre de Asociado')
                            ->placeholder('Nombre de Asociado')
                            ->columnSpan([
                                'sm' => 3,
                                'xl' => 4,
                                '2xl' => 5,
                            ]),
                        Forms\Components\TextInput::make('estado')
                            ->label('Estado')
                            ->placeholder('Estado')
                            ->columnSpan([
                                'sm' => 1,
                                'xl' => 2,
                                '2xl' => 3,
                            ]),
                        Forms\Components\TextInput::make('pagaduria')
                            ->label('Pagaduria')
                            ->placeholder('Pagaduria')
                            ->columnSpan([
                                'sm' => 3,
                                'xl' => 4,
                                '2xl' => 5,
                            ]),
                        ]),
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
            'index' => Pages\ListGestionAsociados::route('/'),
            'create' => Pages\CreateGestionAsociado::route('/create'),
            //'edit' => Pages\EditGestionAsociado::route('/{record}/edit'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('create');
    }
}
