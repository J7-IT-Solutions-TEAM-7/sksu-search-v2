<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert(
            [
                ['position_code' => 'ADMIN',
                 'position_desc' => 'Admin'  
                ], //1
                ['position_code' => 'DH',
                 'position_desc' => 'Department Head'
                ], //2
                ['position_code' => 'SEC',
                 'position_desc' => 'Secretary'
                ],//3
                ['position_code' => 'ACCT',
                 'position_desc' => 'Accountant'
                ],//4
                ['position_code' => 'UPRES',
                 'position_desc' => 'University President'
                ],//5
                ['position_code' => 'CH',
                 'position_desc' => 'Campus Head'
                ],//6
                ['position_code' => 'BUDOFF',
                 'position_desc' => 'Budget Officer'
                ],//7
                ['position_code' => 'PRESEC',
                 'position_desc' => 'President\'s Secretary'
                ],//8
                ['position_code' => 'FAC',
                 'position_desc' => 'Faculty'
                ],//9
                ['position_code' => 'STAFF',
                 'position_desc' => 'Staff'
                ],//10
                ['position_code' => 'ICUOFF',
                 'position_desc' => 'ICU Officer'
                ],//11
                ['position_code' => 'DIR',
                 'position_desc' => 'Director'
                ],//12
                ['position_code' => 'VP',
                 'position_desc' => 'Vice President'
                ],//13
                ['position_code' => 'UBSD',
                 'position_desc' => 'University Board Secretary & Director'
                ],//14
                ['position_code' => 'CHIEF',
                 'position_desc' => 'Chief'
                ],//15
                ['position_code' => 'ASSTDIR',
                 'position_desc' => 'Asst. Director'
                ],//16
                ['position_code' => 'UREG',
                 'position_desc' => 'University Registrar'
                ],//17
                ['position_code' => 'DEAN',
                 'position_desc' => 'Dean'
                ],//18
                ['position_code' => 'CHMAN',
                 'position_desc' => 'Chairman'
                ],//19
                ['position_code' => 'BUDOFFIII',
                 'position_desc' => 'Budget Officer III'
                ],//20
                ['position_code' => 'UCASH',
                 'position_desc' => 'University Cashier'
                ],//21
                ['position_code' => 'ACCTOFF',
                 'position_desc' => 'Accounting Officer'
                ],//22
                ['position_code' => 'ADOFF',
                 'position_desc' => 'Admin Officer'
                ],//23
                ['position_code' => 'ARC',
                 'position_desc' => 'Archiver'
                ],//24
                ['position_code' => 'REG',
                 'position_desc' => 'Registrar'
                ],//25

            ]);
    }
}
