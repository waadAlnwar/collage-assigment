<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Page;

class UserProfile extends Page
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationLabel = "حسابي";
    protected static ?string $navigationGroup = "حسابي";
    protected static string $view = 'filament.pages.user-profile';
    public $first_name;
    public $last_name;
    public $email;

    protected static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public function mount()
    {
        $user = auth()->user();
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
    }

    protected function getFormSchema(): array
    {
        return [
            Grid::make()->schema([
            TextInput::make('first_name')->required()->label('الإسم الأول'),
            TextInput::make('last_name')->required()->label('إسم العائلة'),
            TextInput::make('email')->required()->label('البريد الإلكتروني')
            ])
        ];
    }

    public function updateSettings()
    {
        $this->validate([
            'first_name' => 'required|min:2|max:30',
            'last_name' => 'required|min:2|max:80',
            'email' => 'required|email'
        ]);

        User::find(auth()->user()->id)->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email
        ]);

        $this->notify('success', 'تم حفظ الإعدادات');
    }

    protected function getHeading(): string
    {
        return "إعدادات الحساب";
    }
}
