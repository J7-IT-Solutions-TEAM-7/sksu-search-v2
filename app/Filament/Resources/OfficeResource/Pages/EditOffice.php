<?php

namespace App\Filament\Resources\OfficeResource\Pages;

use App\Filament\Resources\OfficeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use App\Models\Employee_information;
use App\Models\Campus;
use Filament\Forms\Components\Grid;

class EditOffice extends EditRecord
{
    protected static string $resource = OfficeResource::class;

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
            TextInput::make('office_name')->required(),
            TextInput::make('office_code')->label(__('Code'))->minLength(7)->maxLength(8)->required(),
            Select::make('campus_id')
                ->label('Campus')
                ->options(Campus::all()->pluck('name', 'id'))
                ->searchable()->required(),
                Select::make('head_id')
                ->label('Head')
                ->options(Employee_information::all()->pluck('full_name', 'id'))
                ->searchable(),
        ])
       
      
    ];
    }

    protected function getRedirectUrl(): string
    {
    return $this->getResource()::getUrl('index');
    }
}
