<?php

namespace App\Filament\Resources\CierreMensualResource\Pages;

use App\Filament\Resources\CierreMensualResource;
use App\Filament\Resources\CierreMensualResource\Widgets\DetalleCierreMensualWidget;
use Filament\Actions;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;

class ViewCierreMensual extends ViewRecord
{
    protected static string $resource = CierreMensualResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Infolists\Components\TextEntry::make('mes_cierre')->label('Mes Cierre'),
            Infolists\Components\TextEntry::make('fecha_cierre')->label('Fecha Cierre')->date('d/m/Y')
        ]);
    }

    

    
}
