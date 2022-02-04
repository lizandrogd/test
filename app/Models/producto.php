<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'nombre',
        'talla',
        'observaciones',
        'cantidad',
        'fecha',
        'marca_id'
       

    ];

    public function marcas(){
        return $this->belongsTo('App\Models\marca','marca_id');
    }
}
