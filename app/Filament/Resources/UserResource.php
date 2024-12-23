<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{

    protected static ?string $navigationGroup = 'Настройки пользователя';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Пользователи админ-панели';
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $model = User::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Данные пользователя')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->label('Имя')
                            ->placeholder('Введите имя')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->label('Email адрес')
                            ->placeholder('Введите email адрес')
                            ->required()
                            ->maxLength(255),
//                        Forms\Components\DateTimePicker::make('email_verified_at'),
                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->label('Пароль ')
                            ->placeholder('Введите пароль')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('roles')
                            ->multiple()
                            ->label('Выберите роль')
                            ->placeholder('Выберите роль')
                            ->relationship('roles', 'name')
                            ->preload(),
                        Forms\Components\Select::make('permissions')
                            ->multiple()
                            ->label('Выберите разрешение')
                            ->placeholder('Выберите разрешение')
                            ->relationship('permissions', 'name')
                            ->preload()
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('name')->label('Имя')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')->label('Email адрес')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Дата создания')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->label('Дата обновления')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where(function ($query) {
                $query->whereHas('roles', function ($query) {
                    $query->where('name', '!=', 'Super-Admin');
                })
                    ->orWhereDoesntHave('roles');
            });
    }
}

