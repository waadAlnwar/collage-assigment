<?php

namespace App\Filament\Pages;

use Filament\Widgets\AccountWidget;
use App\Filament\Widgets\TaskWidget;
use App\Filament\Widgets\CustomerWidget;
use App\Filament\Resources\TaskResource\Widgets\TasksChart;
use App\Filament\Resources\TaskResource\Widgets\TasksOverview;
use App\Filament\Resources\TaskResource\Widgets\ClosedTask3Days;

class DashboardPage extends \Filament\Pages\Dashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.pages.dashboard-page';

    protected function getHeaderWidgets(): array
    {
        return [
            AccountWidget::class,
        ];
    }
}