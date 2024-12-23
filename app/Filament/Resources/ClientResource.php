<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientResource\Pages;
use App\Filament\Resources\ClientResource\RelationManagers;
use App\Models\Category;
use App\Models\Client;
use App\Models\Language;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $navigationLabel = "Клиент";
    protected static ?string $modelLabel = "Клиент";
    protected static ?string $navigationGroup = "Наши клиенты";

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('lang_id')
                    ->options(Language::pluck('name', 'id')->map(function ($name) {
                        return $name === 'en' ? 'English' : 'Русский';
                    }))
                    ->label('язык')
                    ->required()
                    ->extraAttributes(['style' => 'float: right; width: 30%; ']),
                Forms\Components\Section::make('Клиент')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Заключения'),

                        TiptapEditor::make('description')
                            ->label('Описание')
                            ->profile('default|simple|minimal|none|custom')
                            ->tools([
                                'heading',
                                'bullet-list',
                                'ordered-list',
                                'checked-list',
                                'blockquote',
                                'hr',
                                'bold',
                                'italic',
                                'strike',
                                'underline',
                                'superscript',
                                'subscript',
                                'lead',
                                'small',
                                'align-left',
                                'align-center',
                                'align-right',
                                'link',
                                'media',
                                'oembed',
                                'table',
                                'grid-builder',
                                'details',
                                'code',
                                'code-block',
                                'source'
                            ])
                            ->disk('public')
                            ->directory('uploads')
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif'])
                            ->maxSize(1024),

                        Forms\Components\FileUpload::make('image')
                            ->imageEditor()
                            ->label('Изображение')
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Заключения'),

            ])
            ->filters([

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
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }
}

