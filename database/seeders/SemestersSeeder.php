<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SemestersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Semester::factory(1)->create();
    }
}
