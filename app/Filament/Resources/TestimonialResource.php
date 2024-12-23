<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Filament\Resources\TestimonialResource\RelationManagers;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestimonialResource extends Resource
{
    use Translatable;

    public static function getTranslatableLocales(): array
    {
        return ['ru', 'en'];
    }

    protected static ?string $model = Testimonial::class;
    protected static ?string $navigationGroup = 'Главная';
    protected static ?string $navigationLabel = 'Отзывы';
    protected static ?string $modelLabel = 'Отзывы';
    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-oval-left-ellipsis';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Отзывы')
                    ->schema([
                        Forms\Components\Grid::make('2')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                ->label('Имя')
                                ->placeholder('Имя'),
                                Forms\Components\TextInput::make('job_type')
                                ->label('Тип работы')
                                ->placeholder('Тип работы'),
                                Forms\Components\TextInput::make('title')
                                ->label('Заголовок')
                                ->placeholder('Заголовок'),
                                Forms\Components\Textarea::make('description')
                                ->label('Описание')
                                ->placeholder('Описание'),
                                Forms\Components\TextInput::make('rating')
                                    ->required()
                                    ->label('Рейтинг')
                                    ->placeholder('Рейтинг')
                                    ->numeric()
                                    ->default(1)
                                    ->minValue(1)
                                    ->maxValue(5),
                                Forms\Components\FileUpload::make('image')
                                    ->image()
                                ->label('Изображение')
                                ->placeholder('Изображение'),
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('rating')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('job_type'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\ImageColumn::make('image'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->paginated(false);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
