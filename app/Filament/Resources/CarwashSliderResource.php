<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarwashSliderResource\Pages;
use App\Models\CarwashSlider;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;

class CarwashSliderResource extends Resource
{
    protected static ?string $model = CarwashSlider::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Sliders';
    protected static ?string $pluralModelLabel = 'Sliders';
    protected static ?string $modelLabel = 'Slider';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(100),

                FileUpload::make('image_path')
                    ->label('Gambar')
                    ->directory('carwash_sliders')
                    ->image()
                    ->required(),

                TextInput::make('link')
                    ->label('Link')
                    ->url()
                    ->nullable(),

                TextInput::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->minValue(1)
                    ->required(),

                Toggle::make('status')
                    ->label('Aktif')
                    ->default(true)
                    ->inline(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Judul')
                    ->sortable()
                    ->searchable(),

                ImageColumn::make('image_path')
                    ->label('Gambar')
                    ->rounded(),

                TextColumn::make('link')
                    ->label('Link')
                    ->url()
                    ->limit(30)
                    ->wrap(),

                TextColumn::make('order')
                    ->label('Urutan')
                    ->sortable(),

                IconColumn::make('status')
                    ->label('Status')
                    ->boolean(),
            ])
            ->defaultSort('order', 'asc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCarwashSliders::route('/'),
            'create' => Pages\CreateCarwashSlider::route('/create'),
            'edit' => Pages\EditCarwashSlider::route('/{record}/edit'),
        ];
    }
}
