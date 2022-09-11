<?php

namespace App\Filament\Resources\UserAccountResource\Pages;

use App\Filament\Resources\UserAccountResource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserAccount extends EditRecord
{
    protected static string $resource = UserAccountResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getFormSchema(): array
    {
    return [
        Grid::make(2)
        ->schema([
            TextInput::make('email')->required(),
        ])
       
      
    ];
    }

    protected function getRedirectUrl(): string
    {
    return $this->getResource()::getUrl('index');
    }

    protected function afterDelete(): void{
        
    }
}
