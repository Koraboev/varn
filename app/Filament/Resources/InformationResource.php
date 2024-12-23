<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InformationResource\Pages;
use App\Filament\Resources\InformationResource\RelationManagers;
use App\Models\Information;
use App\Models\Language;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InformationResource extends Resource
{
    protected static ?string $model = Information::class;
    protected static ?string $navigationGroup = "Наши клиенты";

    protected static ?string $navigationLabel = "Информация ";
    protected static ?string $modelLabel = "Информация  ";
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('lang-id')
                    ->options(Language::pluck('name', 'id')->map(function ($name) {
                        return $name === 'en' ? 'English' : 'Русский';
                    }))
                    ->label('язык')
                    ->required()
                    ->extraAttributes(['style' => 'float: right; width: 30%; ']),
                Forms\Components\Section::make('Верхний и Нижний текст')
                    ->schema([
                        TiptapEditor::make('description')
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
                       ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('description')->limit(20)
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
            'index' => Pages\ListInformation::route('/'),
            'create' => Pages\CreateInformation::route('/create'),
            'edit' => Pages\EditInformation::route('/{record}/edit'),
        ];
    }
}
