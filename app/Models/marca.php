<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marca extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'referencia'


       

    ];

    public function productos(){
        return $this->hasMany('App\Models\producto','marca_id');
    }
}

