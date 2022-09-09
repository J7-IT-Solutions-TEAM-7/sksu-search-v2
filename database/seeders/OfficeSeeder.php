<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offices')->insert([
            'office_name'=> 'Administration',
            'office_code'=>'acc-adm',
            'campus_id'=>'1',
            ]);//1
            DB::table('offices')->insert([
                'office_name'=> 'Budget Office',
                'office_code'=>'acc-budg',
                'campus_id'=>'1',
                'admin_user_id'=>'49',
                'head_id'=>'47',
                ]);//2
                DB::table('offices')->insert([
                    'office_name'=> 'Accounting Office',
                    'office_code'=>'acc-acto',
                    'campus_id'=>'1',
                    'admin_user_id'=>'19',
                    'head_id'=>'60',
                    ]);//3
                    DB::table('offices')->insert([
                    'office_name'=> 'Information and Communications Tech',
                    'office_code'=>'acc-ict',
                    'campus_id'=>'1',
                    ]);//4
                    DB::table('offices')->insert([
                    'office_name'=> 'Internal Control Unit',
                    'office_code'=>'acc-icu',
                    'campus_id'=>'1',
                    'admin_user_id'=>'45',
                    'head_id'=>'44',                    
                    ]);//5
                    DB::table('offices')->insert([
                        'office_name'=> 'Academic Affairs',
                        'office_code'=>'acc-acaf',
                        'admin_user_id'=>'1',
                        'campus_id'=>'1',
                        ]);//6
                    DB::table('offices')->insert([
                        'office_name'=> 'Research Development and Extension Services',
                        'office_code'=>'acc-rdes',
                        'admin_user_id'=>'2',
                        'campus_id'=>'1',
                        ]);//7
                    DB::table('offices')->insert([
                        'office_name'=> 'Finance, Administration and Resource Generation',
                        'office_code'=>'acc-rdes',
                        'admin_user_id'=>'50',
                        'campus_id'=>'1',
                        ]);//8 
                        
                    DB::table('offices')->insert([
                        'office_name'=> 'Student Admission and Record Office',
                        'office_code'=>'acc-saro',
                        'admin_user_id'=>'3',
                        'campus_id'=>'1',
                        ]);//9

                    DB::table('offices')->insert([
                        'office_name'=> 'Instruction',
                        'office_code'=>'acc-ins',
                        'admin_user_id'=>'4',
                        'campus_id'=>'1',
                        ]);//10

                    DB::table('offices')->insert([
                        'office_name'=> 'Research Development',
                        'office_code'=>'acc-rd',
                        'admin_user_id'=>'5',
                        'campus_id'=>'1',
                        ]);//11 
                        
                    DB::table('offices')->insert([
                        'office_name'=> 'Extension Services',
                        'office_code'=>'acc-es',
                        'admin_user_id'=>'6',
                        'campus_id'=>'1',
                        ]);//12
                        
                    DB::table('offices')->insert([
                        'office_name'=> 'Resource Generation',
                        'office_code'=>'acc-es',
                        'admin_user_id'=>'7',
                        'campus_id'=>'1',
                        ]);//13
                        
                    DB::table('offices')->insert([
                        'office_name'=> 'Planning and Development',
                        'office_code'=>'acc-pad',
                        'admin_user_id'=>'8',
                        'campus_id'=>'1',
                        ]);//14 
                        
                    DB::table('offices')->insert([
                        'office_name'=> 'Human Resource Management and Development',
                        'office_code'=>'acc-hrms',
                        'admin_user_id'=>'9',
                        'campus_id'=>'1',
                        ]);//15         
                        
                    DB::table('offices')->insert([
                        'office_name'=> 'Quality Management System and Assurance',
                        'office_code'=>'acc-qmsa',
                        'admin_user_id'=>'10',
                        'campus_id'=>'1',
                        ]);//16
                        
                    DB::table('offices')->insert([
                        'office_name'=> 'Public Relations and Information Office',
                        'office_code'=>'acc-prio',
                        'admin_user_id'=>'11',
                        'campus_id'=>'1',
                        ]);//17 

                    DB::table('offices')->insert([
                        'office_name'=> 'GAD',
                        'office_code'=>'acc-gad',
                        'admin_user_id'=>'12',
                        'campus_id'=>'1',
                        ]);//18 
                        
                    DB::table('offices')->insert([
                        'office_name'=> 'Security Services',
                        'office_code'=>'acc-ss',
                        'admin_user_id'=>'13',
                        'campus_id'=>'1',
                        ]);//19
                        
                    DB::table('offices')->insert([
                        'office_name'=> 'uICT Office',
                        'office_code'=>'acc-uict',
                        'admin_user_id'=>'14',
                        'head_id'=>'370',
                        'campus_id'=>'1',
                        ]);//20 
                        
                    DB::table('offices')->insert([
                        'office_name'=> 'MIS Office',
                        'office_code'=>'acc-mis',
                        'admin_user_id'=>'15',
                        'campus_id'=>'1',
                        ]);//21
                        
                    DB::table('offices')->insert([
                        'office_name'=> 'Library Services and Museum',
                        'office_code'=>'acc-lsm',
                        'admin_user_id'=>'16',
                        'campus_id'=>'1',
                        ]);//22
                        
                    DB::table('offices')->insert([
                        'office_name'=> 'Socio-cultural Affairs',
                        'office_code'=>'acc-sca',
                        'admin_user_id'=>'17',
                        'campus_id'=>'1',
                        ]);//23 
                        
                    DB::table('offices')->insert([
                        'office_name'=> 'Sports & Amusement Center',
                        'office_code'=>'acc-sac',
                        'admin_user_id'=>'18',
                        'campus_id'=>'1',
                        ]);//24
                        
                    DB::table('offices')->insert([
                        'office_name'=> 'Finance Services',
                        'office_code'=>'acc-fin',
                        'admin_user_id'=>'19',
                        'campus_id'=>'1',
                        ]);//25
                        
                    DB::table('offices')->insert([
                        'office_name'=> 'NSTP',
                        'office_code'=>'acc-nstp',
                        'campus_id'=>'1',
                        ]);//26
                        
                    DB::table('offices')->insert([
                        'office_name'=> 'Guidance & Testing Center',
                        'office_code'=>'acc-gtc',
                        'admin_user_id'=>'21',
                        'campus_id'=>'1',
                        ]);//27
                        
                     DB::table('offices')->insert([
                         'office_name'=> 'Alumni Relations',
                         'office_code'=>'acc-ar',
                         'admin_user_id'=>'22',
                         'campus_id'=>'1',
                         ]);//28

                    DB::table('offices')->insert([
                        'office_name'=> 'Instructional Materials Development Center',
                        'office_code'=>'acc-imdc',
                        'admin_user_id'=>'23',
                        'campus_id'=>'1',
                        ]);//29

                    DB::table('offices')->insert([
                        'office_name'=> 'Student Affairs & Services',
                        'office_code'=>'acc-safs',
                        'admin_user_id'=>'24',
                        'campus_id'=>'1',
                        ]);//30
                        
                     DB::table('offices')->insert([
                        'office_name'=> 'Health Services',
                        'office_code'=>'acc-hs',
                        'admin_user_id'=>'25',
                        'campus_id'=>'1',
                        ]);//31
                          
                     DB::table('offices')->insert([
                        'office_name'=> 'General Services and Motorpool',
                        'office_code'=>'acc-gsm',
                        'admin_user_id'=>'26',
                        'campus_id'=>'1',
                        ]);//32 
                       
                    DB::table('offices')->insert([
                      'office_name'=> 'Climate Change & DRRMC',
                      'office_code'=>'acc-ccdrrmc',
                      'admin_user_id'=>'28',
                      'campus_id'=>'1',
                      ]);//33 
                      
                    DB::table('offices')->insert([
                      'office_name'=> 'DRRMC',
                      'office_code'=>'acc-drrmc',
                      'admin_user_id'=>'29',
                      'campus_id'=>'1',
                      ]);//34
                      
                     DB::table('offices')->insert([
                       'office_name'=> 'Board Review and Coaching',
                       'office_code'=>'acc-brc',
                       'admin_user_id'=>'30',
                       'campus_id'=>'1',
                       ]);//35

                    DB::table('offices')->insert([
                      'office_name'=> 'Graduate School',
                      'office_code'=>'acc-gs',
                      'admin_user_id'=>'32',
                      'campus_id'=>'1',
                      ]);//36
                     
                    DB::table('offices')->insert([
                       'office_name'=> 'College of Law',
                       'office_code'=>'acc-law',
                       'admin_user_id'=>'33',
                       'campus_id'=>'1',
                       ]);//37 
                       
                    DB::table('offices')->insert([
                     'office_name'=> 'College of Teacher Education',
                     'office_code'=>'acc-ted',
                     'admin_user_id'=>'34',
                     'campus_id'=>'1',
                     ]);//38
                     
                    DB::table('offices')->insert([
                       'office_name'=> 'College of Health Sciences',
                       'office_code'=>'acc-hs',
                       'admin_user_id'=>'35',
                       'campus_id'=>'1',
                       ]);//39
                       
                    DB::table('offices')->insert([
                       'office_name'=> 'College of Criminal Justice Education',
                       'office_code'=>'acc-cje',
                       'admin_user_id'=>'36',
                       'campus_id'=>'1',
                       ]);//40  
                     
                    DB::table('offices')->insert([
                       'office_name'=> 'College of Business Administration & Hotel Management',
                       'office_code'=>'acc-bahm',
                       'admin_user_id'=>'37',
                       'campus_id'=>'1',
                      ]);//41 
                      
                    DB::table('offices')->insert([
                      'office_name'=> 'College of Arts and Sciences',
                      'office_code'=>'acc-aas',
                      'admin_user_id'=>'38',
                      'campus_id'=>'1',
                     ]);//42
                     
                    DB::table('offices')->insert([
                       'office_name'=> 'College of Computer Studies',
                       'office_code'=>'acc-cs',
                       'admin_user_id'=>'91',
                       'campus_id'=>'1',
                      ]);//43  
                      
                    DB::table('offices')->insert([
                       'office_name'=> 'College of Industrial Technology',
                       'office_code'=>'acc-it',
                       'admin_user_id'=>'40',
                       'campus_id'=>'1',
                     ]);//44 
                     
                     DB::table('offices')->insert([
                       'office_name'=> 'College of Engineering',
                       'office_code'=>'acc-eng',
                       'admin_user_id'=>'41',
                       'campus_id'=>'1',
                       ]);//45 

                    DB::table('offices')->insert([
                       'office_name'=> 'University Accreditation',
                       'office_code'=>'acc-uacc',
                       'admin_user_id'=>'42',
                       'campus_id'=>'1',
                       ]);//46  


                       
                    DB::table('offices')->insert([
                       'office_name'=> 'Science Laboratory High School',
                       'office_code'=>'acc-slhs',
                       'admin_user_id'=>'43',
                       'campus_id'=>'1',
                       ]);//47
                      
                    DB::table('offices')->insert([
                       'office_name'=> 'Internal Audit',
                       'office_code'=>'acc-ia',
                       'campus_id'=>'1',
                       ]);//48 
                       
                    DB::table('offices')->insert([
                       'office_name'=> 'Supply Office',
                       'office_code'=>'acc-so',
                       'admin_user_id'=>'46',
                       'campus_id'=>'1',
                       ]);//49

                    DB::table('offices')->insert([
                       'office_name'=> 'Faculty',
                       'office_code'=>'acc-fac',
                       'campus_id'=>'1',
                       ]);//50 
                       
                    DB::table('offices')->insert([
                       'office_name'=> 'President\'s Office',
                       'office_code'=>'acc-presoff',
                       'campus_id'=>'1',
                        'admin_user_id'=>'64',
                        'head_id'=>'63',
                        ]);//51 
                        
                    DB::table('offices')->insert([
                        'office_name'=> 'Cashier\'s Office',
                        'office_code'=>'acc-cashoff',
                        'campus_id'=>'1',
                        'admin_user_id'=>'65',
                        'head_id'=>'66',
                        ]);//52

                    DB::table('offices')->insert([
                        'office_name'=> 'College of Fisheries',
                        'office_code'=>'kal-fish',
                        'campus_id'=>'4',
                        'admin_user_id'=>'169',
                        // 'head_id'=>'66',
                        ]);//53
                        
                    DB::table('offices')->insert([
                        'office_name'=> 'Agri-Aqua Center',
                        'office_code'=>'kal-aac',
                        'campus_id'=>'4',
                        'admin_user_id'=>'169',
                            // 'head_id'=>'66',
                        ]);//54

                    DB::table('offices')->insert([
                        'office_name'=> 'Regional Communal Food Processing Center',
                        'office_code'=>'acc-rcfpc',
                        'campus_id'=>'1',
                        'admin_user_id'=>'27',
                        ]);//55
                        
                    DB::table('offices')->insert([
                        'office_name'=> 'Registrar',
                        'office_code'=>'acc-reg',
                        'campus_id'=>'1',
                        'admin_user_id'=>'31',
                        ]);//56

                    DB::table('offices')->insert([
                        'office_name'=> 'Registrar',
                        'office_code'=>'isu-reg',
                        'campus_id'=>'3',
                        'admin_user_id'=>'226',
                        ]);//57              
    
    }
}
