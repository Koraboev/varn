<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdditionalResource\Pages;
use App\Filament\Resources\AdditionalResource\RelationManagers;
use App\Models\Additional;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdditionalResource extends Resource
{
    use Translatable;

    public static function getTranslatableLocales(): array
    {
        return ['ru', 'en'];
    }
    protected static ?string $model = Additional::class;
    protected static ?string $navigationParentItem='Специалист';
    protected static ?string $navigationGroup = 'О нас';
    protected static ?string $modelLabel='Верхний текст';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('')
                ->schema([
                    RichEditor::make('content')
                    ->label('Верхний текст')
                    ->placeholder('Верхний текст')
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('content')->limit(20)->label('Верхний текст')
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
            'index' => Pages\ListAdditionals::route('/'),
            'create' => Pages\CreateAdditional::route('/create'),
            'edit' => Pages\EditAdditional::route('/{record}/edit'),
        ];
    }
}
