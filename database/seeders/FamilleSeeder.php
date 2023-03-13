<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FamilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('familles');

        $familles = array(
            array('libelle' => 'consommables informatiques'),
            array('libelle' => 'Ordinateurs et Imprimantes'),
            array('libelle' => 'Fournitures Bureau'),
        );

        DB::table('familles')->insert($familles);
    }
}
