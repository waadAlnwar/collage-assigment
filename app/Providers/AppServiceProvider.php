<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        Filament::serving(function () {
            Filament::registerUserMenuItems([
                'account' => UserMenuItem::make()->url(route('filament.pages.user-profile')),
                UserMenuItem::make()->label('حسابي')
                    ->url(route('filament.pages.user-profile'))->icon('heroicon-s-cog'),
            ]);
        });
    }

    public function boot()
    {
        Filament::registerTheme(mix('css/filament.css'));
        Filament::registerStyles([asset('custom_filament.css')]);
    }
}