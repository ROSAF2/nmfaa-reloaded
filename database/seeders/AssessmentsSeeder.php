<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AssessmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Assessment::factory(4)->create();
    }
}
