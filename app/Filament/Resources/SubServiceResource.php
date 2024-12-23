<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubServiceResource\Pages;
use App\Filament\Resources\SubServiceResource\RelationManagers;
use App\Models\Service;
use App\Models\SubService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class SubServiceResource extends Resource
{
    use Translatable;

    public static function getTranslatableLocales(): array
    {
        return ['ru', 'en'];
    }
    protected static ?string $modelLabel='Название услуги';
    protected static ?string $model = SubService::class;
    protected static ?string $navigationLabel='Название услуги';
    protected static ?string $navigationParentItem='Основная услуга';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->label('Название услуги')
                                    ->placeholder('Введите основную услугу')->reactive()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                        if ($operation !== 'create') {
                                            return;
                                        }

                                        $set('slug', Str::slug($state));
                                    }),

                                Forms\Components\TextInput::make('slug')
                                    ->label('Слаг название услуги')
                                    ->disabled()
                                    ->dehydrated()
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(SubService::class, 'slug', ignoreRecord: true),
                            ]),
                        Forms\Components\Select::make('service_id')
                        ->label('Основная услуга')
                        ->placeholder('Выберите основную услугу')
                        ->options(Service::all()->pluck('name', 'id'))
                        ->searchable()
                        ->required(),
                        Forms\Components\RichEditor::make('description'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Название услуги')->limit(25),
                Tables\Columns\TextColumn::make('service.name')
                    ->label('Основная услуга')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([

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
            'index' => Pages\ListSubServices::route('/'),
            'create' => Pages\CreateSubService::route('/create'),
            'edit' => Pages\EditSubService::route('/{record}/edit'),
        ];
    }
}
