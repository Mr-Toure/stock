<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            DirectionSeeder::class,
            /*SsdirectionSeeder::class,
            ServiceSeeder::class,*/
            FonctionSeeder::class,
            FamilleSeeder::class,
            TypefourSeeder::class,
            FournisseurSeeder::class,
            FournitureSeeder::class,
            //AgentSeeder::class,
        ]);
    }
}
