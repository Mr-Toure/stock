<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypefourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('typefours');

        $typefours = array(
            array('id'=>'3', 'libelle' => 'IMPRIMANTE LASER','famille_id' => '2'),
            array('id'=>'4','libelle' => 'IMPRIMANTE JET D\'ENCRE','famille_id' => '2'),
            array('id'=>'5','libelle' => 'CARTOUCHE','famille_id' => '1'),
            array('id'=>'6','libelle' => 'Regroupement papier','famille_id' => '3'),
            array('id'=>'7','libelle' => 'Papiers d\'impression','famille_id' => '3'),
            array('id'=>'8','libelle' => 'PC PORTABLE','famille_id' => '2'),
            array('id'=>'9','libelle' => 'Fonctionnement','famille_id' => '3'),
            array('id'=>'10','libelle' => 'ACCESSOIRES INFORMATIQUES','famille_id' => '2')
        );

        DB::table('typefours')->insert($typefours);
    }
}
