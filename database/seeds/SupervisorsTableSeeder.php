<?php

use Illuminate\Database\Seeder;
use App\Supervisor;

class SupervisorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supervisor::insert([
            [
                'first_name' => 'Lyubomir',
                'last_name' => 'Filipov'
            ],
            [
                'first_name' => 'Zlatko',
                'last_name' => 'Vurbanov'
            ]
        ]);
    }
}
