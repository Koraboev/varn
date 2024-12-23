<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Category;
use App\Models\Post;
use App\Models\SubService;
use App\Models\Tag;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Nette\Utils\Image;

class PostResource extends Resource
{
    use Translatable;

    public static function getTranslatableLocales(): array
    {
        return ['ru', 'en'];
    }

    protected static ?string $model = Post::class;
    protected static ?string $modelLabel='ПOСТ';
    protected static ?string $navigationGroup = 'Новости';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'ПOСТ';

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('ПOСТ')
                    ->schema([
                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->label('Заголовок поста')
                                    ->placeholder('Заголовок поста')->reactive()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                        if ($operation !== 'create') {
                                            return;
                                        }

                                        $set('slug', Str::slug($state));
                                    }),

                                Forms\Components\TextInput::make('slug')
                                    ->label('URL-адрес страницы')
                                    ->disabled()
                                    ->dehydrated()
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(Post::class, 'slug', ignoreRecord: true),
                            ]),
                       Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\Select::make('category_id')
                                    ->label('Название категории')
                                    ->options(Category::pluck('name', 'id'))
                                    ->placeholder('Название категории'),
                                Forms\Components\Checkbox::make('status')
                                    ->label('Разместить на главной странице')
                                    ->default(false)
                            ]),
                        Forms\Components\FileUpload::make('image')
                            ->label('Изображение поста')
                            ->placeholder('Изображение поста')
                            ->imageEditor()
                           ->optimize('webp')
                            ->resize(50)
                           ->directory('posts/thumbnails'),
                        Forms\Components\RichEditor::make('content')


                    ]),
                Forms\Components\Section::make('Выберите тег')
                    ->schema([
                        Forms\Components\Select::make('tags')
                            ->label('Теги')
                            ->multiple()
                            ->options(Tag::all()->mapWithKeys(function ($tag) {
                                return [$tag->id => $tag->name];
                            }))
                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Заголовок поста'),
                TextColumn::make('category.name')->label('Название категории'),
                Tables\Columns\ImageColumn::make('image')->label('Изображение')

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->headerActions([
                Tables\Actions\LocaleSwitcher::make(),
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
            RelationManagers\TagsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
