<?php

namespace App\Filament\Resources\UserAccountResource\Pages;

use App\Filament\Resources\UserAccountResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserAccounts extends ListRecords
{
    protected static string $resource = UserAccountResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->color('success')
            ->label('Add Account'),
        ];
    }
}
