<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacunas extends Model
{
    use HasFactory;
    protected $table = 'vacunas';
    protected $primaryKey = 'id_vacuna';
    protected $fillable = ['nombre_vacuna', 'fecha_vacuna', 'descripcion_vacuna'];

}
