<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $label = "مشرف";
    protected static ?string $pluralLabel = "المشرفين";
    protected static ?string $navigationLabel = "المشرفين";
    protected static ?string $navigationGroup = "المستخدمين والوصول";

    protected static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->can('users_create');
    }

    public static function canCreate(): bool
    {
        return auth()->user()->can('users_list');
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user()->can('users_update');
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()->can('users_delete');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('first_name')->maxLength(30)->required()->label('الإسم الأول'),
                TextInput::make('last_name')->maxLength(80)->required()->label('إسم العائلة'),
                TextInput::make('email')->email()->label('البريد الإلكتروني')->required(),
                TextInput::make('password')->label('كلمة المرور')->password()
                    ->visible(fn ($livewire) => $livewire instanceof CreateRecord)
                    ->dehydrateStateUsing(function ($state) {
                        return bcrypt($state);
                    }),
                MultiSelect::make('roles')->relationship('roles', 'name')->preload()->label('الأدوار')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')->label('الإسم الأول')->searchable(),
                TextColumn::make('last_name')->label('إسم العائلة')->searchable(),
                TextColumn::make('email')->label('البريد الإلكتروني')->searchable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->modalHeading(fn($record) => "حذف " . $record->first_name),
            ])
            ->filters([
                //
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
