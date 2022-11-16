<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categorie::create([
            'nom'=>'hight tech',
            'slug'=>'hight tech'
        ]);
        Categorie::create([
            'nom'=>'livres',
            'slug'=>'hight tech'
        ]);Categorie::create([
            'nom'=>'meuble',
            'slug'=>'hight tech'
        ]);Categorie::create([
            'nom'=>'nourriture',
            'slug'=>'hight tech'
        ]);
        




    }
}
