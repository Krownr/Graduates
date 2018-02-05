<?php

use Illuminate\Database\Seeder;
use App\Thesis;
use Carbon\Carbon;

class ThesesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Thesis::insert([
            'student_id' => '1',
            'supervisor_id' => '1',
            'topic' => 'Graduates',
            'mark' => '6',
            'presentation_date' => '2018-02-07 08:30:00',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
