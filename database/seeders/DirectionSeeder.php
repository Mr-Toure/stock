<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('directions');

        $directions = array(
            array('libelle' => 'Greffier Chef','initiale' => 'GC','pass' => '042MQ224','vpass' => '6F5550AB'),
        );

        DB::table('directions')->insert($directions);
    }
}
