<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande_Produit extends Model
{
    use HasFactory;
    protected $table = 'commande_produit';
    protected $fillable = ['commande_id','produit_id','qty','prix'];
}
