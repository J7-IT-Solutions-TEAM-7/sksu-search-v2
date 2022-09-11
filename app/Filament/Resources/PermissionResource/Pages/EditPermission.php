<?php

namespace App\Filament\Resources\PermissionResource\Pages;

use App\Filament\Resources\PermissionResource;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Toggle;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPermission extends EditRecord
{
    protected static string $resource = PermissionResource::class;

    protected function getActions(): array
    {
        return [
           // Actions\DeleteAction::make(),
        ];
    }

    protected function getFormSchema(): array
    {
    return [
        Grid::make(2)
        ->schema([
           Toggle::make('activated')
           ->label('Allow Override')
           ->onIcon('heroicon-s-lightning-bolt')
           ->offIcon('heroicon-s-lightning-bolt')
           ->onColor('warning')
           ->offColor('warning '),
        ])
       
      
    ];
    }

    protected function getRedirectUrl(): string
    {
    return $this->getResource()::getUrl('index');
    }
}
