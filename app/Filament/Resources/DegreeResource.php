<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Degree;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\DegreeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DegreeResource\RelationManagers;

class DegreeResource extends Resource
{
    protected static ?string $model = Degree::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    // protected static ?string $navigationGroup = '';
    protected static ?string $label = "الدرجة";
    protected static ?string $pluralLabel = "الدرجات";
    protected static ?string $navigationLabel = "الدرجات";


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('الدرجة العلمية')->required()->maxLength(249)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('الدرجة العلمية')->searchable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([]);
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
            'index' => Pages\ListDegrees::route('/'),
            'create' => Pages\CreateDegree::route('/create'),
            'edit' => Pages\EditDegree::route('/{record}/edit'),
        ];
    }
}
