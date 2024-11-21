<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    
    protected $primaryKey = 'id_222058'; 
    public $incrementing = true; 
    protected $keyType = 'int';
    protected $table = 'pengguna_222058';
    protected $guarded = [];
}
