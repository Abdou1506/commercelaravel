<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * 
     * 
     * @return array<string, mixed>
     */
    protected $model=Produit::class;
    public function definition()
    {
        $nom =$this->faker->sentence(3);
        return [
            'slug'=>Str::slug($nom),
            'libelle'=>$nom,
            'subtitle'=>$this->faker->sentence(10),
            'description'=>$this->faker->paragraph(),
            'prix'=>$this->faker->numberBetween(15,300)*100,
            'image'=>'https://via.placeholder.com/200x200',
            'categorie_id'=>rand(1,4)
        ];
    }
}
