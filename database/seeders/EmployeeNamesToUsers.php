<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee_information;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EmployeeNamesToUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            $employee = Employee_information::where('user_id', $user->id)->first();
            DB::table('users')->where('id', $user->id)->update([
                'name' => $employee->full_name
            ]);
        }
    }
}
