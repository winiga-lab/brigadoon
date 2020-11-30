<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;
    
	protected $table = 'noter';

    protected $fillable = ['note', 'noteur', 'notee'];

    public $timestamps = false;

}