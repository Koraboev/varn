<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnershipAdditionalResource\Pages;
use App\Models\Language;
use App\Models\PartnershipAdditional;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PartnershipAdditionalResource extends Resource
{


    protected static ?string $modelLabel='Верхний и Нижний текст';
    protected static ?string $model = PartnershipAdditional::class;
    protected static ?string $navigationLabel='Верхний и Нижний текст';
    protected static ?string $navigationGroup='О нас';
    protected static ?string $navigationParentItem='Партнёрство';

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
                Forms\Components\Section::make('Верхний и Нижний текст')
                    ->schema([
                        TiptapEditor::make('top_content')
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
                            TiptapEditor::make('bottom_content')
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
                                ->maxSize(1024)
                    ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('top_content')->limit(15),
                Tables\Columns\TextColumn::make('bottom_content')->limit(15),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('lang_id')
                    ->label('язык')
                    ->options(Language::pluck('name', 'id'))
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListPartnershipAdditionals::route('/'),
            'create' => Pages\CreatePartnershipAdditional::route('/create'),
            'edit' => Pages\EditPartnershipAdditional::route('/{record}/edit'),
        ];
    }
}
