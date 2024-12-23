<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnershipResource\Pages;
use App\Filament\Resources\PartnershipResource\RelationManagers;
use App\Models\Partnership;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PartnershipResource extends Resource
{
    use Translatable;
    public static function getTranslatableLocales(): array
    {
        return ['ru', 'en'];
    }
    protected static ?string $modelLabel='Партнёрство';
    protected static ?string $model = Partnership::class;

    protected static ?string $navigationLabel = "Партнёрство";
    protected static ?string $navigationGroup = 'О нас';
    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Партнёрство')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('company_name')->label('Название компании')->placeholder('Название компании'),
                                Forms\Components\TextInput::make('company_link')->label('Ссылка на компанию')->placeholder('Ссылка на компанию'),
                                 Forms\Components\TextInput::make('country_name')->label('Название страны')->placeholder('Название страны'),
                                Forms\Components\TextInput::make('city_name')->label('Название города')->placeholder('Название города'),
                            ]),
                        Forms\Components\FileUpload::make('flag_image')
                            ->placeholder('Enter Post Images')
                            ->label('Images')
                            ->image()
                            ->directory('image')
                            ->disk('public'),
//                        Forms\Components\FileUpload::make('flag_image')->label('Флаг страны')->placeholder('Флаг страны')
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company_name')->label('Название компании'),
                Tables\Columns\TextColumn::make('country_name')->label('Название страны'),
                Tables\Columns\TextColumn::make('city_name')->label('Название города'),
                ImageColumn::make('flag_image')->label('Флаг страны')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListPartnerships::route('/'),
            'create' => Pages\CreatePartnership::route('/create'),
            'edit' => Pages\EditPartnership::route('/{record}/edit'),
        ];
    }
}
