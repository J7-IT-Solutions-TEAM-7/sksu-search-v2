<?php

namespace App\Filament\Resources\BondsResource\Pages;

use App\Filament\Resources\BondsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBonds extends ListRecords
{
    protected static string $resource = BondsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Add Bond')
            ->color('success'),
        ];
    }
}
