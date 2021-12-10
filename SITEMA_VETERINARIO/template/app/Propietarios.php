<?php

namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietarios extends Model
{
    //use HasFactory;
    protected $table = 'propietarios';
    protected $primaryKey = 'dni_propietario';
    public $incrementing = false;
    protected $fillable = ['nombre_vacuna', 'fecha_vacuna', 'descripcion_vacuna'];
}
