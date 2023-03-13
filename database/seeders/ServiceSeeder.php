<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services');

        $services = array(
            array('libelle' => 'GESTION ADMINISTRATIVE DU PERSONNEL','ssdirection_id' => '1'),
            array('libelle' => 'SOUS-DIRECTEUR INFORMATIQUE','ssdirection_id' => '2'),
            array('libelle' => 'SOUS-DIRECTEUR ETAT CIVIL','ssdirection_id' => '3'),
            array('libelle' => 'SERVICE ETUDE PROJETS INFORMATIQUES','ssdirection_id' => '2'),
            array('libelle' => 'SERVICE GESTION DU PARC INFORMATIQUE','ssdirection_id' => '2'),
            array('libelle' => 'SERVICE SECURISATION DES ACTES ET RENFORCEMENT DES CAPACITES INFORMATIQUES','ssdirection_id' => '2'),
            array('libelle' => 'SECRETAIRE GENERAL ADJOINT','ssdirection_id' => '23'),
            array('libelle' => 'SECRETARIAT DU SGA','ssdirection_id' => '23'),
            array('libelle' => 'LA SECRETAIRE GENERALE','ssdirection_id' => '24'),
            array('libelle' => 'SECRETARIAT DE LA SG','ssdirection_id' => '24'),
            array('libelle' => 'SOUS-DIRECTEUR DE LA QUALITE','ssdirection_id' => '25'),
            array('libelle' => 'REGISSEUR','ssdirection_id' => '5'),
            array('libelle' => 'REPROGRAPHIE','ssdirection_id' => '23'),
            array('libelle' => 'Sous-Directeur Dépenses','ssdirection_id' => '5'),
            array('libelle' => 'Sous-Directeur Etat Civil et Population Statistique','ssdirection_id' => '3'),
            array('libelle' => 'COMPTABILITE','ssdirection_id' => '5'),
            array('libelle' => 'SERVICE SALAIRE ET CONTROLE','ssdirection_id' => '5'),
            array('libelle' => 'SECRETARIAT DSF','ssdirection_id' => '5'),
            array('libelle' => 'MARCHES PUBLICS','ssdirection_id' => '5'),
            array('libelle' => 'SERVICE TRANSPORT','ssdirection_id' => '4'),
            array('libelle' => 'SOUS-DIRECTEUR RECOUVREMENT','ssdirection_id' => '4'),
            array('libelle' => 'SOUS-DIRECTEUR AFFAIRES ECONOMIQUES','ssdirection_id' => '12'),
            array('libelle' => 'TAXES FORFAITAIRES','ssdirection_id' => '4'),
            array('libelle' => 'SERVICE DOMANIAL','ssdirection_id' => '4'),
            array('libelle' => 'REGIE RECETTES','ssdirection_id' => '4'),
            array('libelle' => 'SERVICE MARCHES PUBLICS','ssdirection_id' => '5'),
            array('libelle' => 'DIRECTEUR DES AFFAIRES ADMINISTRATIVES','ssdirection_id' => '26'),
            array('libelle' => 'SECRETARIAT DE LA DSA','ssdirection_id' => '26'),
            array('libelle' => 'ASSISTANT DSA','ssdirection_id' => '26'),
            array('libelle' => 'SECRETARIAT DE LA DST','ssdirection_id' => '27'),
            array('libelle' => 'CONSTRUCTION','ssdirection_id' => '14'),
            array('libelle' => 'SERVICE GESTION DU PARC AUTOMOBILE','ssdirection_id' => '16'),
            array('libelle' => 'SERVICE ASSAINISSEMENT','ssdirection_id' => '15'),
            array('libelle' => 'SOUS-DIRECTEUR ASSAINISSEMENT','ssdirection_id' => '15'),
            array('libelle' => 'SOUS-DIRECTEUR MOYENS GENERAUX','ssdirection_id' => '16'),
            array('libelle' => 'SERVICE VOIRIE ET RESEAUX DIVERS','ssdirection_id' => '14'),
            array('libelle' => 'DIRECTEUR TECHNIQUE','ssdirection_id' => '27'),
            array('libelle' => 'DIRECTRICE DSSHP','ssdirection_id' => '31'),
            array('libelle' => 'SOUS-DIRECTEUR DU SERVICE SANITAIRE','ssdirection_id' => '21'),
            array('libelle' => 'SOUS-DIRECTRICE DU SERVICE HYGIENE','ssdirection_id' => '33'),
            array('libelle' => 'SOUS-DIRECTRICE DU SERVICE SOCIAL','ssdirection_id' => '34'),
            array('libelle' => 'SECRETARIAT DSSHP','ssdirection_id' => '31'),
            array('libelle' => 'DIRECTEUR DACSPH','ssdirection_id' => '30'),
            array('libelle' => 'SECRETARIAT DACSPH','ssdirection_id' => '30'),
            array('libelle' => 'SOUS-DIRECTEUR CULTURE SPORTS ET LOISIRS','ssdirection_id' => '17'),
            array('libelle' => 'SOUS-DIRECTRICE EDUCATION','ssdirection_id' => '18'),
            array('libelle' => 'INTERDANT','ssdirection_id' => '24'),
            array('libelle' => 'SOUS-DIRECTRICE RELATIONS PUBLIQUES','ssdirection_id' => '35'),
            array('libelle' => 'SECRETAIRE DES ADJOINTS AU MAIRE','ssdirection_id' => '36'),
            array('libelle' => 'SECRETAIRE DU DIRECTEUR DE CABINET','ssdirection_id' => '36'),
            array('libelle' => 'SERVICE MARIAGE','ssdirection_id' => '3'),
            array('libelle' => 'GESTION PREVISIONNELLE DES EMPLOIS ET DES COMPETENCES','ssdirection_id' => '7'),
            array('libelle' => 'SOUS-DIRECTRICE DES RESSOURCES HUMAINES','ssdirection_id' => '7'),
            array('libelle' => 'DIRECTEUR DE LA COMMUNICATION','ssdirection_id' => '37'),
            array('libelle' => 'SOUS-DIRECTEUR DES AFFAIRES ADMINISTRATIVES','ssdirection_id' => '26'),
            array('libelle' => 'SERVICE DES ARCHIVES ET DE LA DOCUMENTATION','ssdirection_id' => '3'),
            array('libelle' => 'SECRETARIAT PARTICULIER DU MAIRE','ssdirection_id' => '36'),
            array('libelle' => 'S/D DES AFFAIRES .JURIDIQUES','ssdirection_id' => '24'),
            array('libelle' => 'ASSISTANT AU SG','ssdirection_id' => '24'),
            array('libelle' => 'SECURISATION DES ACTES ETAT-CIVIL','ssdirection_id' => '2'),
            array('libelle' => 'COMPTABILIT&eacute;','ssdirection_id' => '4'),
            array('libelle' => 'SECRETARIAT DU MAIRE','ssdirection_id' => '36'),
            array('libelle' => 'CHARG&eacute; DE COMMUNICATION DU MAIRE','ssdirection_id' => '36'),
            array('libelle' => 'POLICE MUNICIPALE','ssdirection_id' => '24'),
            array('libelle' => 'S/D ETUDES ET PROJETS ADMINISTRATIFS','ssdirection_id' => '26'),
            array('libelle' => 'MAINTENANCE','ssdirection_id' => '27'),
            array('libelle' => 'MARCHE CENTRAL DE PORT-BOUET','ssdirection_id' => '13'),
            array('libelle' => 'DIRECTEUR DE CABINET','ssdirection_id' => '36'),
            array('libelle' => 'PRESSE ECRITE','ssdirection_id' => '37'),
            array('libelle' => 'RADIO ATM','ssdirection_id' => '10'),
            array('libelle' => 'ETAT-CIVIL','ssdirection_id' => '3'),
            array('libelle' => 'S/D BIBLIOTHEQUE MUNICIPALE','ssdirection_id' => '20'),
            array('libelle' => 'SOUS - DIRECTION SECURITE','ssdirection_id' => '24'),
            array('libelle' => 'PFS PORT BOUET - MISSION LOCALE','ssdirection_id' => '36'),
            array('libelle' => 'STATISTIQUE &amp; POPULATION','ssdirection_id' => '3'),
            array('libelle' => 'COURRIER','ssdirection_id' => '24'),
            array('libelle' => 'SECRETARIAT DU SECRETARIAT GENERAL','ssdirection_id' => '24'),
            array('libelle' => 'ASSISTAANT DU SECRETARIAT GENERAL','ssdirection_id' => '24'),
            array('libelle' => 'CEDV','ssdirection_id' => '31'),
            array('libelle' => 'CONSEILLER','ssdirection_id' => '36'),
            array('libelle' => 'GESTION ADMINISTRATIVE DU PERS. &amp; AFFAIRES SOC.','ssdirection_id' => '7'),
            array('libelle' => 'TAXE DE NUIT','ssdirection_id' => '5'),
            array('libelle' => 'PRESSE DIGITALE','ssdirection_id' => '11'),
            array('libelle' => 'CENTRE DE SANTE DERRIERE WHARF','ssdirection_id' => '31'),
            array('libelle' => 'Permanent PDCI','ssdirection_id' => '36'),
            array('libelle' => 'webmaster','ssdirection_id' => '37'),
            array('libelle' => 'AGENT ADMINISTRATIF','ssdirection_id' => '26'),
        );
        DB::table('services')->insert($services);
    }
}
