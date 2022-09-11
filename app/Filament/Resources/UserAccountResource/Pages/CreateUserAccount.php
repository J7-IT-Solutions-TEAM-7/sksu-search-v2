<?php

namespace App\Filament\Resources\UserAccountResource\Pages;

use App\Filament\Resources\UserAccountResource;
use App\Models\Employee_information;
use App\Models\User;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\DB;

class CreateUserAccount extends CreateRecord
{
    protected static string $resource = UserAccountResource::class;
    
    protected function getRedirectUrl(): string
    {
    return $this->getResource()::getUrl('index');
    }

    protected function beforeCreate(): void
    {
        // Runs before the form fields are saved to the database.
    }

    protected function afterCreate(): void
    {
        $user_id = User::latest('id')->first();
        $user_name = Employee_information::where('id', $user_id->name)->first();

        User::where('id', $user_id->id)->update([
            'name' => $user_name->full_name
        ]);

        Employee_information::where('id', $user_name->id)->update([
            'user_id' => $user_id->id
        ]);
    }
}
