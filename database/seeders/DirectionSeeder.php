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
            array('libelle' => 'CABINET DU MAIRE','initiale' => 'CAB','pass' => '04252224','vpass' => '6F5550AB'),
            array('libelle' => 'SECRETARIAT GENERAL','initiale' => 'SG','pass' => 'C415B99C','vpass' => '2A3A6B54'),
            array('libelle' => 'DIRECTION ADMINISTRATIVE','initiale' => 'DSA','pass' => '462EDD65','vpass' => '491DA592'),
            array('libelle' => 'DIRECTION SOCIO-SANITAIRE (D.S-S.H.P)','initiale' => 'DSSHP','pass' => 'D36C7A02','vpass' => '23B85C3C'),
            array('libelle' => 'DIRECTION DES ACTIVITES CULTURELLES(D.A.S.C.PH)','initiale' => 'DACSPH','pass' => '087B1BBF','vpass' => '575D473B'),
            array('libelle' => 'DIRECTION DE LA COMMUNICATION','initiale' => 'DCOM','pass' => '4BD0E8C2','vpass' => '4C0C346E'),
            array('libelle' => 'DIRECTION TECHNIQUE','initiale' => 'DST','pass' => '31BC40EB','vpass' => '3ADB7C9B'),
            array('libelle' => 'DIRECTION FINANCIERE','initiale' => 'DSF','pass' => '3E382665','vpass' => 'AE0266EA'),
            array('libelle' => 'MAIRE','initiale' => 'M','pass' => 'E275B6DF','vpass' => '9484F1BF')
        );

        DB::table('directions')->insert($directions);
    }
}
