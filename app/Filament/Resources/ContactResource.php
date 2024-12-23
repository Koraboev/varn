<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactResource extends Resource
{
    use Translatable;

    public static function getTranslatableLocales(): array
    {
        return ['ru', 'en'];
    }

    protected static ?string $model = Contact::class;
    protected static ?string $modelLabel = 'Контактная информация';
    protected static ?string $navigationIcon = 'heroicon-o-phone';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Контактная информация')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('address')
                                    ->label('Адрес')
                                    ->placeholder('Адрес'),
                                Forms\Components\TextInput::make('work_time')
                                    ->label('Рабочее время')
                                    ->placeholder('Рабочее время'),
                            ]),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('phone1')
                                    ->label('Номер телефона')
                                    ->placeholder('Номер телефона')
                                    ->regex('/^\+998 \(\d{2}\) \d{3}-\d{2}-\d{2}$/')
                                    ->helperText('Введите номер телефона в формате +998 (99) 999-99-99'),
                                Forms\Components\TextInput::make('phone2')
                                    ->label('Номер телефона')
                                    ->placeholder('Номер телефона')
                                    ->regex('/^\+998 \(\d{2}\) \d{3}-\d{2}-\d{2}$/')
                                    ->helperText('Введите номер телефона в формате +998 (99) 999-99-99'),
                            ]),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('email1')
                                    ->label('Электронная почта')
                                    ->placeholder('Электронная почта')
                                    ->email(),
                                Forms\Components\TextInput::make('email2')
                                    ->label('Электронная почта')
                                    ->placeholder('Электронная почта')
                                    ->email(),
                            ]),
                        Forms\Components\Section::make('Социальные сети')
                            ->schema([


                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('facebook')
                                            ->label('Facebook')
                                            ->placeholder('Facebook'),
                                        Forms\Components\TextInput::make('telegram')
                                            ->label('Telegram')
                                            ->placeholder('Telegram'),
                                        Forms\Components\TextInput::make('instagram')
                                            ->label('Instagram')
                                            ->placeholder('Instagram'),
                                        Forms\Components\TextInput::make('youtube')
                                            ->label('Youtube')
                                            ->placeholder('Youtube'),
                                        Forms\Components\TextInput::make('linkedin')
                                            ->label('LinkedIn')
                                            ->placeholder('LinkedIn'),
                                    ]),

                            ]),
                        Forms\Components\Section::make('Текстовое')
                            ->schema([
                                Forms\Components\RichEditor::make('text'),
                            ])
                    ])


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\TextColumn::make('work_time'),
                Tables\Columns\TextColumn::make('phone1'),
                Tables\Columns\TextColumn::make('email1'),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
