<?php

namespace App\Filament\Resources\CarwashSliderResource\Pages;

use App\Filament\Resources\CarwashSliderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarwashSliders extends ListRecords
{
    protected static string $resource = CarwashSliderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
