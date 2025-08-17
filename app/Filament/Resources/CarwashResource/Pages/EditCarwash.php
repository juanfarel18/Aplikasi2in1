<?php

namespace App\Filament\Resources\CarwashResource\Pages;

use App\Filament\Resources\CarwashResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCarwash extends EditRecord
{
    protected static string $resource = CarwashResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
