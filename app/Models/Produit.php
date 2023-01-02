<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Produit extends Model
{
    use HasFactory;
    /**
     * Get the categorie that owns the Produit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categories(): BelongsTo
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }
    public function get_price()
    {
       $prix=$this->prix/100;
       return number_format($prix,2,',',''). ' €';
    }
    /**
     * The commande that belong to the Produit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function commande(): BelongsToMany
    {
        return $this->belongsToMany(Commande::class,'commande_produit');
    }
}
