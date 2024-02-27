<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Inicio extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $title = 'SIAM';
    protected static ?string $navigationLabel = 'Inicio';
    

    protected static string $view = 'filament.pages.inicio';
    protected ?string $subheading = 'Sistema Integral de Administracion Modular';
}
