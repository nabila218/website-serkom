<?php

namespace App\Providers\Filament;

use App\Filament\Widgets\SkaStats;
use Filament\Actions\Action;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName('SKA Admin')
            ->homeUrl('/')
            ->favicon(file_exists(public_path('favicon.png')) ? asset('favicon.png') : null)
            ->darkMode(false)
            ->sidebarCollapsibleOnDesktop()
            ->colors([
                'primary' => Color::Amber,
            ])

            // Gaya tampilan: sidebar, topbar, dan halaman login senada dengan website
            ->renderHook(
                PanelsRenderHook::HEAD_END,
                fn (): string => '<style>
                    body.fi-body{background:#f4f7fb}

                    /* Sidebar biru tua */
                    .fi-sidebar,.fi-sidebar-header{background:#0d2a4a !important;box-shadow:none !important}
                    .fi-sidebar .fi-logo,.fi-sidebar-header .fi-logo{color:#fff !important;font-weight:800}
                    .fi-sidebar-item-label,.fi-sidebar-item-icon{color:#c9d6e8 !important}
                    .fi-sidebar-item-btn:hover{background:rgba(255,255,255,.08) !important}
                    .fi-sidebar-item.fi-active>.fi-sidebar-item-btn{background:rgba(244,185,66,.16) !important}
                    .fi-sidebar-item.fi-active .fi-sidebar-item-label,
                    .fi-sidebar-item.fi-active .fi-sidebar-item-icon{color:#f4b942 !important}

                    /* Topbar dengan garis emas */
                    .fi-topbar>nav{border-bottom:3px solid #f4b942}

                    /* Halaman login */
                    .fi-simple-layout{background:linear-gradient(135deg,#0d2a4a 0%,#123b66 55%,#1c5688 100%) !important}
                    .fi-simple-main{border-radius:16px;box-shadow:0 24px 48px -20px rgba(0,0,0,.5)}
                </style>'
            )

            // Teks pengantar di atas form login
            ->renderHook(
                PanelsRenderHook::AUTH_LOGIN_FORM_BEFORE,
                fn (): string => Blade::render(
                    '<p style="text-align:center;margin-bottom:.5rem;color:#56657a;font-size:.9rem;">
                        Panel pengelola konten<br><strong style="color:#123b66;">PT Solusi Koneksi Anda</strong>
                    </p>'
                )
            )

            // Tautan kembali ke website di bawah form login
            ->renderHook(
                PanelsRenderHook::AUTH_LOGIN_FORM_AFTER,
                fn (): string => Blade::render(
                    '<div style="text-align:center;margin-top:1rem;">
                        <a href="/" style="font-size:.9rem;text-decoration:underline;">← Kembali ke website</a>
                    </div>'
                )
            )

            // "Lihat Website" di menu avatar
            ->userMenuItems([
                Action::make('website')
                    ->label('Lihat Website')
                    ->icon('heroicon-o-globe-alt')
                    ->url('/'),
            ])

            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                SkaStats::class,
            ])
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