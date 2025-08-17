<?php

namespace App\Filament\Resources\CarwashSliderResource\Pages;

use App\Filament\Resources\CarwashSliderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCarwashSlider extends EditRecord
{
    protected static string $resource = CarwashSliderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
