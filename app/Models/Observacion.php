<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    protected $table = 'observacion';
    protected $primaryKey = 'id_observacion';
    protected $fillable = ['observaciones','id_asignatura','id_alumno'];
}
