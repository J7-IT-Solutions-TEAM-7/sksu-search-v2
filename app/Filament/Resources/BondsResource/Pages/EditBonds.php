<?php

namespace App\Filament\Resources\BondsResource\Pages;

use App\Filament\Resources\BondsResource;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBonds extends EditRecord
{
    protected static string $resource = BondsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getFormSchema(): array
    {
    return [
        TextInput::make('employee_information.last_name')
        ->label('Employee')
        ->disabled()
        ->required(),

        TextInput::make('bond_name')
        ->label('Bond')
        ->mask(fn (TextInput\Mask $mask) => $mask
        ->numeric()
        ->decimalPlaces(2) // Set the number of digits after the decimal point.
        ->minValue(1) // Set the minimum value that the number can be.
        ->maxValue(99999999) // Set the maximum value that the number can be.
        ->normalizeZeros() // Append or remove zeros at the end of the number.
        ->padFractionalZeros() // Pad zeros at the end of the number to always maintain the maximum number of decimal places.
        ->thousandsSeparator(','), // Add a separator for thousands.->required(),
        ) 
        ->helperText('Set amount of bond here')
        ->required(),
        DatePicker::make('validity_date')->required(),
  
    ];
    }
}
