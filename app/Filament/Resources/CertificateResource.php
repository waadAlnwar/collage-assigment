<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Certificate;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CertificateResource\Pages;
use App\Filament\Resources\CertificateResource\RelationManagers;

class CertificateResource extends Resource
{
    protected static ?string $model = Certificate::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $label = "الشهادة";
    protected static ?string $pluralLabel = " الشهادات";
    protected static ?string $navigationLabel = "الشهادات";

    protected static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->can('certificate_list');
    }

    public static function canCreate(): bool
    {
        return auth()->user()->can('certificate_list');
    }



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')->label(' الاسم')->searchable(),
                TextColumn::make('student_id')->label('رقم الطالب')->searchable(),
                TextColumn::make('created_at')->label('التاريخ')->date()->sortable(),
                TextColumn::make('status.label')->label('الحالة'),
            ])
            ->filters([
                SelectFilter::make('status')->label('الحالات')->relationship('status', 'label'),
                Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')->label('من'),
                        Forms\Components\DatePicker::make('created_until')->label('الى'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Action::make('processing')
                    ->label("قيد التحضير")
                    ->requiresConfirmation()
                    ->color('success')
                    ->icon('heroicon-o-lock-closed')
                    ->hidden(function (Certificate $record) {
                        return $record->status?->name != 'paid';
                    })
                    ->modalHeading("تغيير الحالة")
                    ->modalButton("قيد التحضير")
                    ->action(function (Certificate $record) {
                        $record->status_id = 3;
                        $record->save();
                    }),

                Action::make('done')
                    ->label("اكتملت")
                    ->requiresConfirmation()
                    ->color('success')
                    ->icon('heroicon-o-lock-closed')
                    ->hidden(function (Certificate $record) {
                        return $record->status?->name != 'processing';
                    })
                    ->modalHeading("تغيير الحالة")
                    ->modalButton("اكتملت")
                    ->action(function (Certificate $record) {
                        $record->status_id = 4;
                        $record->save();
                    }),

                Action::make('done')
                    ->label("تسليم")
                    ->requiresConfirmation()
                    ->color('success')
                    ->icon('heroicon-o-lock-closed')
                    ->hidden(function (Certificate $record) {
                        return $record->status?->name != 'completed';
                    })
                    ->modalHeading("تغيير الحالة")
                    ->modalButton("سلمت")
                    ->action(function (Certificate $record) {
                        $record->status_id = 5;
                        $record->save();
                    }),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListCertificates::route('/'),
            // 'create' => Pages\CreateCertificate::route('/create'),
            'view' => Pages\ViewCertificate::route('/{record}'),
            // 'edit' => Pages\EditCertificate::route('/{record}/edit'),
        ];
    }
}
