<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SpecialistResource\Pages;
use App\Filament\Resources\SpecialistResource\RelationManagers;
use App\Models\Specialist;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SpecialistResource extends Resource
{
    use Translatable;

    public static function getTranslatableLocales(): array
    {
        return ['ru', 'en'];
    }

    protected static ?string $modelLabel = 'Специалист';
    protected static ?string $model = Specialist::class;
    protected static ?string $navigationLabel = "Специалист";
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationGroup = 'О нас';

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('')
                    ->schema([
                        Forms\Components\FileUpload::make('specialist_image')
                            ->placeholder('Изображение специалиста')
                            ->label('Изображение специалиста')
                            ->imageEditor(),
                        Forms\Components\TextInput::make('specialist_name')
                            ->label('Имя специалиста')
                            ->placeholder('Имя специалиста'),
                   Forms\Components\TextInput::make('specialist_job')
                            ->label('специалиста')
                            ->placeholder('специалиста'),
                        Forms\Components\Checkbox::make('status')
                            ->label('Разместить на главной странице')
                            ->default(false),

                        Forms\Components\RichEditor::make('description'),
                        Forms\Components\FileUpload::make('images')
                            ->placeholder('Изображение наград')
                            ->label('Изображение наград')
                            ->multiple()
                            ->imageEditor(),

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('specialist_name')->label('Имя специалиста')->searchable(),
                Tables\Columns\ImageColumn::make('specialist_image')->label('Изображение специалиста')
            ])
            ->filters([
                //
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
            'index' => Pages\ListSpecialists::route('/'),
            'create' => Pages\CreateSpecialist::route('/create'),
            'edit' => Pages\EditSpecialist::route('/{record}/edit'),
        ];
    }
}
