<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;
    
	protected $table = 'memberships';

    protected $fillable = ['personne_id', 'compte_id'];

    public $timestamps = false;

}