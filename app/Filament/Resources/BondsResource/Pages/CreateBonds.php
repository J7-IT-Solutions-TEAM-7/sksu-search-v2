<?php

namespace App\Filament\Resources\BondsResource\Pages;

use App\Filament\Resources\BondsResource;
use App\Models\Bond;
use App\Models\Employee_information;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBonds extends CreateRecord
{ 
    protected static string $resource = BondsResource::class;

    protected function getRedirectUrl(): string
    {
    return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        $bond = Bond::latest('id')->first();

        Employee_information::where('id', $bond->employee_id)->update([
            'bond_id' => $bond->id
        ]);
    }


}
