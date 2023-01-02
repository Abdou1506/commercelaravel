<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Commande extends Model
{
    use HasFactory;
    protected  $fillable=['user_id','libelle','qte','prix','paye','delivre'];
    /**
     * Get the user that owns the Commande
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get all of the produits for the Commande
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function produit(): HasMany
    // {
    //     return $this->hasMany(Produit::class);
    // }
    /**
     * The produit that belong to the Commande
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function produit(): BelongsToMany
    {
        return $this->belongsToMany(Produit::class)->withPivot('qty','prix');
    }
}
