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
            array('libelle' => 'S/D DE L’IDENTIFICATION ','direction_id' => '4'),
            array('libelle' => 'S/D INFORMATIQUE','direction_id' => '4'),
            array('libelle' => 'S/D ETAT-CIVIL ET POPULATION STATISTIQUE','direction_id' => '4'),
            array('libelle' => 'S/D RECOUVREMENT','direction_id' => '9'),
            array('libelle' => 'S/D DEPENSES','direction_id' => '9'),
            array('libelle' => 'S/D ETUDES ET PROJETS ADMINISTRATIFS','direction_id' => '4'),
            array('libelle' => 'S/D DES RESSOURCES HUMAINES','direction_id' => '4'),
            array('libelle' => 'S/D COOPERATION ET RELATIONS DE PARTENARIAT','direction_id' => '1'),
            array('libelle' => 'S/D MARKETING ET PUBLICITE','direction_id' => '7'),
            array('libelle' => 'S/D RADIO DIFFUSION','direction_id' => '7'),
            array('libelle' => 'S/D PRESSE ET COMMUNICATION EVENE MENTIELLE','direction_id' => '7'),
            array('libelle' => 'S/D AFFAIRES ECONOMIQUES ','direction_id' => '9'),
            array('libelle' => 'S/D RECOUVREMENTS ','direction_id' => '9'),
            array('libelle' => 'S/D CONTRUCTION ET URBANISME','direction_id' => '8'),
            array('libelle' => 'S/D ASSAINISSEMENT ENVIRONNENT ET CADRE DE VIE','direction_id' => '8'),
            array('libelle' => 'S/D MOYENS GENERAUX','direction_id' => '8'),
            array('libelle' => 'S/D CULTURE SPORT ET LOISIRS','direction_id' => '6'),
            array('libelle' => 'S/D EDUCATION VIE ASSOCIATIVE ET INSERTION','direction_id' => '6'),
            array('libelle' => 'S/D AFFAIRES SOCIALES','direction_id' => '6'),
            array('libelle' => 'S/D BIBLIOTHEQUE MUNICIPALE','direction_id' => '6'),
            array('libelle' => 'S/D SERVICES SANITAIRES','direction_id' => '5'),
            array('libelle' => 'S/D HYGIENE PUBLIQUE','direction_id' => '5'),
            array('libelle' => 'SECRETARIAT GENERAL ADJOINT','direction_id' => '2'),
            array('libelle' => 'SECRETARIAT GENERAL','direction_id' => '2'),
            array('libelle' => 'S/D QUALITE','direction_id' => '1'),
            array('libelle' => 'direction_id DES SERVICES ADMINISTRATIFS','direction_id' => '4'),
            array('libelle' => 'direction_id TECHNIQUE','direction_id' => '8'),
            array('libelle' => 'direction_id ACTIVITES CULTURELLES','direction_id' => '6'),
            array('libelle' => 'direction_id DSSHP','direction_id' => '5'),
            array('libelle' => 'S/D SERVICE HYGIENE','direction_id' => '5'),
            array('libelle' => 'S/D SERVICE SOCIAL','direction_id' => '5'),
            array('libelle' => 'S/D RELATIONS PUBLIQUES','direction_id' => '1'),
            array('libelle' => 'CABINET','direction_id' => '1'),
            array('libelle' => 'direction_id DE LA COMMUNICATION','direction_id' => '7'),
            array('libelle' => 'TRESOR','direction_id' => '9'),
            array('libelle' => 'direction_id FINANCIERE','direction_id' => '9'),
            array('libelle' => 'SD CONTROLE','direction_id' => '9')
        );

        DB::table('ssdirections')->insert($ssdirections);
    }
}
