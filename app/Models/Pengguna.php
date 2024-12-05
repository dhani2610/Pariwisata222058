<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
    use HasFactory;

    protected $guard_name = 'pengguna';
    
    protected $primaryKey = 'id_222058'; 
    public $incrementing = true; 
    protected $keyType = 'int';
    protected $table = 'pengguna_222058';
    protected $guarded = [];
    
}
