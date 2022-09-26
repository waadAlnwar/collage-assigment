<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Page;

class Settings extends Page
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationLabel = "الإعدادات العامة";
    protected static ?string $navigationGroup = "الإعدادات";
    protected static string $view = 'filament.pages.settings';
    public $usd_rate;

    protected static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->can('settings_access');
    }

    public function mount()
    {
        $settings = Setting::first();
        $this->usd_rate = $settings->usd_rate;
    }

    protected function getFormSchema(): array
    {
        return [
            Grid::make()->schema([
                TextInput::make('usd_rate')->required()->label('سعر صرف الدولار مقابل الجنيه')
            ])->columns(3)
        ];
    }

    public function updateSettings() {
        $this->validate([
            'usd_rate' => 'required|integer'
        ]);

        $settings = Setting::where('id', 1)->first();
        $settings->update([
            'usd_rate' => $this->usd_rate,
        ]);

        $this->notify('success', 'تم حفظ الإعدادات');

    }

    protected function getHeading(): string
    {
        return "الإعدادات العامة";
    }
}
