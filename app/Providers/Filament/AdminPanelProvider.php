<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;
use App\Filament\Pages\Auth\Login;
use App\Filament\Resources\GestionAsociadoResource;
use Filament\Support\Enums\MaxWidth;






class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('')
            ->login()
            ->passwordReset()
            ->profile()
            ->font('Roboto')
            ->authGuard('web')
            ->collapsibleNavigationGroups()
            ->sidebarFullyCollapsibleOnDesktop()
            ->brandName('Siam')
            ->brandLogo(asset('images/logo.png'))
            ->brandLogoHeight('5rem')
            ->navigationGroups([
                NavigationGroup::make('Administracion de Terceros')
                    ->label('Administracion de Terceros'),
                NavigationGroup::make('Gestión de Asociados')
                    ->label('Gestión de Asociados')
                    ->collapsed(),    
                NavigationGroup::make('Contabilidad')
                    ->label('Contabilidad')              
                    ->collapsed(),
                NavigationGroup::make('Parametros')
                    ->label('Parametros')
                    ->collapsed(),
                NavigationGroup::make('Roles y Permisos')
                    ->label('Roles y Permisos')
                    ->collapsed(),
            ])
            ->colors([
                'danger' => Color::Rose,
                'gray' => Color::Gray,
                'info' => Color::Blue,
                'primary' => Color::Emerald,
                'success' => Color::Red,
                'warning' => Color::Orange,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
            ])
            ->plugin(FilamentSpatieRolesPermissionsPlugin::make())
            ->spa()
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
