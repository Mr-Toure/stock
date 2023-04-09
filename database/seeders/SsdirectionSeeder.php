<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SsdirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ssdirections');

        $ssdirections = array(
            array('id' => '1','libelle' => 'Services Des Caisses','direction_id' => '1','created_at' => '2023-03-14 12:50:00','updated_at' => '2023-03-14 12:50:00'),
            array('id' => '2','libelle' => 'Services du Budget et de la comptabilité','direction_id' => '1','created_at' => '2023-03-14 12:50:52','updated_at' => '2023-03-14 12:50:52'),
            array('id' => '3','libelle' => 'Secrétariat Du Greffier GC','direction_id' => '1','created_at' => '2023-03-14 12:51:59','updated_at' => '2023-03-14 12:51:59'),
            array('id' => '4','libelle' => 'Greffier En Chef Adjoint','direction_id' => '1','created_at' => '2023-03-14 12:53:07','updated_at' => '2023-03-14 12:53:07'),
            array('id' => '5','libelle' => 'Greffe Parquet','direction_id' => '1','created_at' => '2023-03-14 12:53:39','updated_at' => '2023-03-14 12:53:39'),
            array('id' => '6','libelle' => 'Greffe Instruction','direction_id' => '1','created_at' => '2023-03-14 12:54:09','updated_at' => '2023-03-14 12:54:09'),
            array('id' => '7','libelle' => 'Service Des Archives','direction_id' => '1','created_at' => '2023-03-14 12:55:14','updated_at' => '2023-03-14 12:55:14'),
            array('id' => '8','libelle' => 'Service Des Actes Administratifs (CNI & CJ)','direction_id' => '1','created_at' => '2023-03-14 12:55:58','updated_at' => '2023-03-14 12:55:58'),
            array('id' => '9','libelle' => 'Service Informatique','direction_id' => '1','created_at' => '2023-03-14 12:56:20','updated_at' => '2023-03-14 12:56:20'),
            array('id' => '10','libelle' => 'Service RCCM','direction_id' => '1','created_at' => '2023-03-14 12:57:18','updated_at' => '2023-03-14 12:57:18'),
            array('id' => '11','libelle' => 'Service Accueil & Bureau d\'assistance judicaire','direction_id' => '1','created_at' => '2023-03-14 12:58:46','updated_at' => '2023-03-14 12:58:46'),
            array('id' => '12','libelle' => 'Service Requête & Service Communication','direction_id' => '1','created_at' => '2023-03-14 12:59:34','updated_at' => '2023-03-14 12:59:34'),
            array('id' => '13','libelle' => 'Service d\'enrôlement civil et commercial','direction_id' => '1','created_at' => '2023-03-14 13:00:17','updated_at' => '2023-03-14 13:00:17'),
            array('id' => '14','libelle' => 'services  des minutes','direction_id' => '1','created_at' => '2023-03-14 13:01:13','updated_at' => '2023-03-14 13:01:13'),
            array('id' => '15','libelle' => 'Section Civile Commercial & Administrative','direction_id' => '1','created_at' => '2023-03-14 13:02:24','updated_at' => '2023-03-14 15:08:21'),
            array('id' => '16','libelle' => 'Section criminelle','direction_id' => '1','created_at' => '2023-03-14 15:09:11','updated_at' => '2023-03-14 16:53:35'),
            array('id' => '18','libelle' => 'Section Sociale','direction_id' => '1','created_at' => '2023-03-14 15:09:28','updated_at' => '2023-03-14 16:53:12'),
            array('id' => '19','libelle' => 'Section Correctionnelle','direction_id' => '1','created_at' => '2023-03-14 15:09:43','updated_at' => '2023-03-14 15:09:43')
          );

        DB::table('ssdirections')->insert($ssdirections);
    }
}
