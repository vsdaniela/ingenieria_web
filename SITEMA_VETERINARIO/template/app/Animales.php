<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Animales extends Model
{
    protected $table = 'animales';
    protected $primaryKey = 'idAnimal';
    public $incrementing = true;
    protected $fillable = ['especie_animal', 'nombre_animal', 'fecha_nac_animal','dni_propietario','caracteristicas_animal'];
    /*public function propietarios()
    {
        return $this->belongsTo('App\Propietarios','foreign_key');
    }*/

}
