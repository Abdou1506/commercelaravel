<?php

namespace Database\Seeders;

use App\Models\Commande;
use Carbon\Factory;
use Faker\Factory as FakerFactory;
use Illuminate\Console\Command;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Commande::factory()
        ->count(50)
        ->create();
    }
}
