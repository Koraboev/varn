<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutVarnResource\Pages;
use App\Models\AboutVarn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class AboutVarnResource extends Resource
{
    use Translatable;

    public static function getTranslatableLocales(): array
    {
        return ['ru', 'en'];
    }

    protected static ?string $model = AboutVarn::class;
    protected static ?string $navigationGroup = 'Главная';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'О Varn';
    protected static ?string $modelLabel = 'О Varn';

    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->placeholder('Заголовок')
                                    ->label('Заголовок'),
                                Forms\Components\TextInput::make('experience')
                                    ->label('Опыт')
                                    ->placeholder('Опыт'),
                                Forms\Components\TextInput::make('skills')
                                    ->placeholder('Клиент')
                                    ->label('Клиент'),
                                Forms\Components\FileUpload::make('image')
                                    ->label('Изображение')
                                    ->placeholder('Изображение')
                                    ->image()
                                    ->imageEditor(),

                            ]),
                        Forms\Components\RichEditor::make('description')
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('experience'),
                Tables\Columns\TextColumn::make('skills'),
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
            'index' => Pages\ListAboutVarns::route('/'),
            'create' => Pages\CreateAboutVarn::route('/create'),
            'edit' => Pages\EditAboutVarn::route('/{record}/edit'),
        ];
    }
}
