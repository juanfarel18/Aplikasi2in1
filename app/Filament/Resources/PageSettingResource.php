<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageSettingResource\Pages;
use App\Filament\Resources\PageSettingResource\RelationManagers;
use App\Models\PageSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PageSettingResource extends Resource
{
    protected static ?string $model = PageSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
       return $form
            ->schema([
                Forms\Components\FileUpload::make('cta_image')
                    ->label('Gambar Call to Action (CTA)')
                    ->image()
                    ->directory('page-settings')
                    ->helperText('Upload gambar yang akan muncul di bagian "Pesan Perawatan Premium Anda".'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cta_image'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListPageSettings::route('/'),
            'create' => Pages\CreatePageSetting::route('/create'),
            'edit' => Pages\EditPageSetting::route('/{record}/edit'),
        ];
    }
}
