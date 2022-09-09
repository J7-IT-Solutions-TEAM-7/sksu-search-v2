<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            [
                ['role_code' => 'ADMIN',
                'role_desc' => 'Admin',
              ], //1
              ['role_code' => 'DH',
               'role_desc' => 'Department Head',  
              ], //2
              ['role_code' => 'SEC',
               'role_desc' => 'Secretary',
              ],//3
              ['role_code' => 'ACCT',
               'role_desc' => 'Accountant',
              ],//4
              ['role_code' => 'BUDOFF',
               'role_desc' => 'Budget Officer',
              ],//5
              ['role_code' => 'PRES',
               'role_desc' => 'President',
              ],//6
              ['role_code' => 'ARC',
               'role_desc' => 'Archiver',
              ]//7
            ]);
    }
}
