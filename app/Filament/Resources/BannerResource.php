<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource\RelationManagers;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BannerResource extends Resource
{
    use Translatable;
    public static function getTranslatableLocales(): array
    {
        return ['ru', 'en'];
    }
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';
    protected static ?string $navigationGroup='Главная';
    protected static ?string $navigationLabel='Баннер';
    protected static ?string $modelLabel='Баннер';
    protected static ?int $navigationSort=1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Баннер')
                ->schema([
                    Forms\Components\TextInput::make('title')
                    ->required()
                    ->label('Title')
                    ->placeholder('Title'),
                    TextInput::make('short_content')
                    ->required()
                    ->label('Short Content')
                    ->placeholder('Short Content'),
                    Forms\Components\FileUpload::make('images')
                    ->label('Images')
                    ->placeholder('Images')
                    ->maxSize(1024)
                    ->multiple(),
                ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('short_content'),
                Tables\Columns\TextColumn::make('images')->limit(2),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->paginated(false);
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
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}
