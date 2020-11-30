<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    use HasFactory;
    
	protected $table = 'etablissement';

    protected $fillable = ['raison_sociale', 'info_generale', 'administrateur', 'adresse_id'];

    public function personne() {
    	return $this->belongsTo('App\Models\Personne');
    }

    public function adresse() {
    	return $this->belongsTo('App\Models\Addresse');
    }
}
