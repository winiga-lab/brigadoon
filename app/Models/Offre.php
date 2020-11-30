<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;
    
	protected $table = 'offre';

    protected $fillable = ['libelle', 'description', 'date_publication', 'date_expiration', 'etablissement_id'];

    public $timestamps = false;

}