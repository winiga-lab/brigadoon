<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diplomer extends Model
{
    use HasFactory;
    
	protected $table = 'diplomer';

    protected $fillable = ['personne_id', 'diplome_id'];

    public function personne() {
    	return $this->belongsTo('App\Models\Personne');
    }

    public function diplome() {
    	return $this->belongsTo('App\Models\Diplome');
    }
}
