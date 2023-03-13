<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FournisseurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fournisseurs');

        $fournisseurs = array(
            array('name' => 'LIBRAIRIE DE FRANCE GROUPE','town' => 'Abidjan','phone' => '04252224'),
            array('name' => 'AMETHISTE','town' => 'Abidjan','phone' => '04252224'),
            array('name' => 'GLOBAL TEAM SERVICES','town' => 'Abidjan','phone' => '04252224'),
            array('name' => 'LES OLIVES','town' => 'Abidjan','phone' => '04252224'),
            array('name' => 'NOUVELLE SOCIETE MROUE (NSM)','town' => 'Abidjan','phone' => '04252224'),
        );

        DB::table('fournisseurs')->insert($fournisseurs);
    }
}
