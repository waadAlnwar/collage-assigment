<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use App\Filament\Resources\RoleResource\RelationManagers;
use App\Rules\English;
use Filament\Forms;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $label = "الدور أو الصلاحية";
    protected static ?string $pluralLabel = "الأدوار والصلاحيات";
    protected static ?string $navigationLabel = "الأدوار والصلاحيات";
    protected static ?string $navigationGroup = "المستخدمين والوصول";

    protected static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->can('roles_access');
    }

    public static function canCreate(): bool
    {
        return auth()->user()->can('roles_access');
    }

    public static function canEdit(Model $record): bool
    {
        return (auth()->user()->can('roles_access') && $record->id != 1);
    }

    public static function canDelete(Model $record): bool
    {
        return (auth()->user()->can('roles_access') && $record->id != 1);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            TextInput::make('name')->label("الإسم")->maxLength(30)
            ->rules([new English])->helperText("بالإنجليزية فقط")->required(),

            CheckboxList::make('permissions')->relationship('permissions', 'label', fn ($query) => $query->orderBy('name'))
            ->label("صلاحيات الوصول")->columns(3),
            Textarea::make('description')->label("الوصف")->rows(1)->maxLength(65)
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label("الإسم")->sortable(),
                TextColumn::make('description')->label("الوصف")->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->modalHeading(fn($record) => "حذف " . $record->name),
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
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }
}
