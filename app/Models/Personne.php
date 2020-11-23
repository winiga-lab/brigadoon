<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;

    protected $table = "personne";

    protected $fillable = ['nom', 'prenom', 'sexe', 'dte_naiss', 'bio', 'adresse'];

    public function adresse() {
    	return $this->belongsTo('App\Models\Adresse');
    }
}
