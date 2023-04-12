<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Career;
use Illuminate\Support\Facades\DB;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('careers')->insert([
            'career' => 'ISC',
        ]);

        DB::table('careers')->insert([
            'career' => 'II',
        ]);

        DB::table('careers')->insert([
            'career' => 'IEM',
        ]);

        DB::table('careers')->insert([
            'career' => 'IE',
        ]);

        DB::table('careers')->insert([
            'career' => 'IER',
        ]);
    }
}
