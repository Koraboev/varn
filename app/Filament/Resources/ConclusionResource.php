<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConclusionResource\Pages;
use App\Filament\Resources\ConclusionResource\RelationManagers;
use App\Models\Conclusion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ConclusionResource extends Resource
{
    protected static ?string $model = Conclusion::class;

    protected static ?string $navigationLabel = "Заключения";
    protected static ?string $modelLabel = "Заключения";
    protected static ?string $navigationGroup = "Наши клиенты";

    protected static ?string $navigationIcon = 'heroicon-o-arrow-trending-up';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Заключения')
            ->schema([
                Forms\Components\TextInput::make('conclusion')
                ->label('Заголовок')
                ->placeholder('Заголовок'),
                Forms\Components\FileUpload::make('image')
                ->label('Изображение')
                    ->placeholder('Изображение')
                ->imageEditor()
            ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('conclusion')->label('Заключения'),
                Tables\Columns\TextColumn::make('image')->label('Изображение'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListConclusions::route('/'),
            'create' => Pages\CreateConclusion::route('/create'),
            'edit' => Pages\EditConclusion::route('/{record}/edit'),
        ];
    }
}
