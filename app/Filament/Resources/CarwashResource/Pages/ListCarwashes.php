<?php

namespace App\Filament\Resources\CarwashResource\Pages;

use App\Filament\Resources\CarwashResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarwashes extends ListRecords
{
    protected static string $resource = CarwashResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
