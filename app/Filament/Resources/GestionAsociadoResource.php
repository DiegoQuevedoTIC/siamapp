<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GestionAsociadoResource\Pages;
use App\Filament\Resources\GestionAsociadoResource\RelationManagers;
use App\Filament\Resources\GestionAsociadoResource\RelationManagers\AsociadosRelationManager;
use App\Models\Asociado;
use App\Models\Tercero;
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
use Filament\Forms\Get;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Set;
use Illuminate\Support\Facades\DB;

class GestionAsociadoResource extends Resource
{
    protected static ?string $model = Asociado::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Gestión de Asociados';
    protected static ?string $navigationGroup = 'Gestión de Clientes';
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
                    ->headerActions([])
                    ->schema([
                        Forms\Components\Select::make('codigo_interno_pag')
                            ->label('Nro Identificacion asociado')
                            ->options(Asociado::all()->pluck('codigo_interno_pag', 'codigo_interno_pag'))
                            ->searchable()
                            ->columnSpan([
                                'sm' => 1,
                                'xl' => 2,
                                '2xl' => 3,
                            ])->live(),
                        Forms\Components\TextInput::make('tercero_id')
                            ->label('Nombre de Asociado')
                            ->placeholder('Nombre de Asociado')
                            ->columnSpan([
                                'sm' => 3,
                                'xl' => 4,
                                '2xl' => 5,
                            ])->disabled(function (Get $get, Set $set) {
                                $codigo_interno_pag = $get('codigo_interno_pag');
                                if (!is_null($codigo_interno_pag)) {
                                    $tercero = DB::table('terceros')
                                        ->join('asociados', 'terceros.id', '=', 'asociados.tercero_id')
                                        ->select('terceros.nombres', 'terceros.primer_apellido', 'terceros.segundo_apellido')
                                        ->where('asociados.codigo_interno_pag', $codigo_interno_pag)
                                        ->first();
                                    $nombre = $tercero->nombres . " " . $tercero->primer_apellido . " " . $tercero->segundo_apellido;
                                    $set('tercero_id', $nombre);
                                    return false;
                                }
                                return true;
                            })->live(),
                        Forms\Components\TextInput::make('estado_cliente_id')
                            ->label('Estado')
                            ->placeholder('Estado')
                            ->columnSpan([
                                'sm' => 1,
                                'xl' => 2,
                                '2xl' => 3,
                            ])->disabled(function (Get $get, Set $set) {
                                $codigo_interno_pag = $get('codigo_interno_pag');
                                if (!is_null($codigo_interno_pag)) {
                                    $estado_cliente = DB::table('estado_clientes')
                                        ->join('asociados', 'estado_clientes.id', '=', 'asociados.estado_cliente_id')
                                        ->select('estado_clientes.id', 'estado_clientes.nombre')
                                        ->where('asociados.codigo_interno_pag', $codigo_interno_pag)
                                        ->first();
                                    $estado = $estado_cliente->nombre;
                                    $set('estado_cliente_id', $estado);
                                    return false;
                                }
                                return true;
                            })->live(),
                        Forms\Components\TextInput::make('pagaduria_id')
                            ->label('Pagaduria')
                            ->placeholder('Pagaduria')
                            ->columnSpan([
                                'sm' => 3,
                                'xl' => 4,
                                '2xl' => 5,
                            ])->disabled(function (Get $get, Set $set) {
                                $codigo_interno_pag = $get('codigo_interno_pag');
                                if (!is_null($codigo_interno_pag)) {
                                    $pagaduria_cliente = DB::table('pagadurias')
                                        ->join('asociados', 'pagadurias.id', '=', 'asociados.pagaduria_id')
                                        ->select('pagadurias.id', 'pagadurias.nombre', 'pagadurias.codigo')
                                        ->where('asociados.codigo_interno_pag', $codigo_interno_pag)
                                        ->first();
                                    $pagaduria =  $pagaduria_cliente->codigo . " " . $pagaduria_cliente->nombre;
                                    $set('pagaduria_id', $pagaduria);
                                    return false;
                                }
                                return true;
                            })->live(),

                        Tabs::make('Tabs')
                            ->tabs([
                                Tabs\Tab::make('Credito')
                                    ->schema([
                                        
                                    ]),
                            ])->columnSpan([
                                'sm' => 5,
                                'xl' => 6,
                                '2xl' => 7,
                            ])
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
            RelationManagers\AsociadosRelationManager::class,
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
