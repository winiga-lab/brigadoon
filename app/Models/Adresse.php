<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;
    
	protected $table = 'adresse';

    protected $fillable = ['code_postal', 'num_immo', 'nom_rue', 'nom_ville'];

    public $timestamps = false;

    public function personnes() {
    	return $this->hasMany('App\Models\Personne');
    }
}
