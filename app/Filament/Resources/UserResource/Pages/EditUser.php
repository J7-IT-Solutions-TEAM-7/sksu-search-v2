<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use App\Models\Employee_information;
use App\Models\Office;
use App\Models\Position;
use App\Models\Role;
use Filament\Forms\Components\Grid;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

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
            TextInput::make('full_name')
            ->helperText('Only the user can edit this on their profile.')
            ->disabled(),
            Select::make('role_id')
            ->label('Role')
            ->options(Role::all()->pluck('role_desc', 'id'))
            ->searchable()->required(),
            Select::make('office_id')
            ->label('Office')
            ->options(Office::all()->pluck('office_name', 'id'))
            ->searchable()->required(),
            Select::make('position_id')
            ->label('Position')
            ->options(Position::all()->pluck('position_desc', 'id'))
            ->searchable()->required(),
        ])
       
      
    ];
    }

    protected function getRedirectUrl(): string
    {
    return $this->getResource()::getUrl('index');
    }
}
