<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::insert([
            [
                'first_name' => 'Stefan',
                'last_name' => 'Georgiev',
                'faculty_number' => '1234567890',
                'speciality_id' => '1'
            ],
            [
                'first_name' => 'Pesho',
                'last_name' => 'Peshev',
                'faculty_number' => '3333333333',
                'speciality_id' => '2'
            ]
        ]);
    }
}
