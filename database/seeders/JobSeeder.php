<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->insert([
            [
                'name' => 'Frontend Web Programmer',
            ],
            [
                'name' => 'Fullstack Web Programmer',
            ],
            [
                'name' => 'Quality Control',
            ],
        ]);
    }
}
