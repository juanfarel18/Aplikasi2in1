<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarwashResource\Pages;
use App\Models\Carwash;
use Filament\Forms;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CarwashResource extends Resource
{
    protected static ?string $model = Carwash::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Komponen pertama: Repeater untuk gambar
                Forms\Components\Repeater::make('images')
                    ->label('Foto Carwash')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->directory('carwashes')
                            ->image()
                            ->required()
                            ->maxSize(10240),
                    ])
                    ->collapsible()
                    ->defaultItems(1)
                    ->reorderable(), // <-- Tambahkan koma di sini

                // Komponen kedua: Toggle untuk status aktif
                Toggle::make('is_active')
                    ->label('Tampilkan di Website')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('images.0.image')
                    ->label('Foto')
                    ->circular()
                    ->disk('public'),

                Tables\Columns\TextColumn::make('id')
                    ->sortable(),
                     Tables\Columns\IconColumn::make('is_active') // <-- Ini dari langkah kita sebelumnya
                ->label('Status Aktif')
                ->boolean(),
        
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCarwashes::route('/'),
            'create' => Pages\CreateCarwash::route('/create'),
            'edit' => Pages\EditCarwash::route('/{record}/edit'),
        ];
    }
}