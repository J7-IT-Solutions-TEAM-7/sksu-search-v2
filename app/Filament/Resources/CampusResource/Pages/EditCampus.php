<?php

namespace App\Filament\Resources\CampusResource\Pages;

use App\Filament\Resources\CampusResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use App\Models\Employee_information;
use Filament\Forms\Components\Grid;

class EditCampus extends EditRecord
{
    protected static string $resource = CampusResource::class;

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
            TextInput::make('name')->required(),
            TextInput::make('campus_code')->label(__('Code'))->minLength(4)->maxLength(6)->required(),
            TextInput::make('address')->required(),
            TextInput::make('telephone')->tel(),
            TextInput::make('email')->email(),
            Select::make('admin_user_id')
            ->label('Admin')
            ->options(Employee_information::all()->pluck('full_name', 'id'))
            ->searchable()
        ])
       
      
    ];
    }

    protected function getRedirectUrl(): string
    {
    return $this->getResource()::getUrl('index');
    }
}
