<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agents');

        $agents = array(
            array('matricule' => '046544','name' => 'OUYA','surname' => 'OULECHAYOU REBECCA','phone' => NULL,'email' => 'test11@test.ci','post' => '412','service_id' => '4','picture' => '046544.png'),
            array('matricule' => '06dc92','name' => 'PROSPER','surname' => 'DJAYA','phone' => NULL,'email' => 'test111@test.ci','post' => NULL,'service_id' => '20','picture' => '06dc92.jpg'),
            array('matricule' => '07afb3','name' => 'N\'DJORE','surname' => 'DANIEL','phone' => NULL,'email' => 'test1111@test.ci','post' => NULL,'service_id' => '15','picture' => '07afb3.jpg'),
            array('matricule' => '07b6f1','name' => 'KRA','surname' => 'CELESTIN','phone' => NULL,'email' => 'test11111@test.ci','post' => NULL,'service_id' => '20','picture' => '07b6f1.jpg'),
            array('matricule' => '0a5eab','name' => 'LOKOUGNAN','surname' => 'FULBERT','phone' => NULL,'email' => 'fulbert.lokougnan@test.ci','post' => NULL,'service_id' => '20','picture' => '0a5eab.jpg'),
            array('matricule' => '0f4a35','name' => 'AGOHI','surname' => 'GISELE','phone' => NULL,'email' => 'test2@test.ci','post' => NULL,'service_id' => '19','picture' => '0f4a35.png'),
            array('matricule' => '0fbf1d','name' => 'CODJOVI','surname' => 'CLéMENTINE','phone' => NULL,'email' => 'Codjovi.clementine@test.ci','post' => NULL,'service_id' => '10','picture' => '0fbf1d.png'),
            array('matricule' => '11d4e4','name' => 'N\\\'GUESSAN','surname' => 'ARMAND','phone' => '709543997','email' => 'test22@test.ci','post' => NULL,'service_id' => '5','picture' => '11d4e4.png'),
            array('matricule' => '15d200','name' => 'GAHA','surname' => 'GEORGES','phone' => NULL,'email' => 'test222@test.ci','post' => NULL,'service_id' => '16','picture' => '15d200.jpg'),
            array('matricule' => '1a2a06','name' => 'DIEKET','surname' => 'SIMEON','phone' => NULL,'email' => 'test2222@test.ci','post' => NULL,'service_id' => '21','picture' => '1a2a06.png'),
            array('matricule' => '1b818e','name' => 'KONATE','surname' => 'MASSANDJE','phone' => NULL,'email' => 'test22222@test.ci','post' => NULL,'service_id' => '20','picture' => '1b818e.jpg'),
            array('matricule' => '1c397f','name' => 'EBATE','surname' => 'PHILIPPE','phone' => NULL,'email' => 'test3@test.ci','post' => NULL,'service_id' => '23','picture' => '1c397f.png'),
            array('matricule' => '1f137b','name' => 'COULIBALY','surname' => 'LAMINE','phone' => NULL,'email' => 'lamine.coulibaly@test.ci','post' => '457','service_id' => '6','picture' => '1f137b.png'),
            array('matricule' => '2035jchqs','name' => 'TOURE','surname' => 'SIMPLICE','phone' => NULL,'email' => 'simplice.toure@test.ci','post' => NULL,'service_id' => '20','picture' => 'default.png'),
        );

        DB::table('agents')->insert($agents);
    }
}
