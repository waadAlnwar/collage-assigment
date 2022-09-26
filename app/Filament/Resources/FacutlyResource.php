<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Facutly;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\FacutlyResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FacutlyResource\RelationManagers;

class FacutlyResource extends Resource
{
    protected static ?string $model = Facutly::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $label = "القسم";
    protected static ?string $pluralLabel = "الاقسام";
    protected static ?string $navigationLabel = "الاقسام";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('اسم القسم')->required()->maxLength(249)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('اسم القسم')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListFacutlies::route('/'),
            'create' => Pages\CreateFacutly::route('/create'),
            'edit' => Pages\EditFacutly::route('/{record}/edit'),
        ];
    }
}
