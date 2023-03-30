<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promedio extends Model
{
    protected $table = 'promedio';
    protected $primaryKey = 'id_promedio';
    protected $fillable = ['promediop1','promediop2','promediop3','promediop4','id_asignatura','id_alumno'];


    public function asignatura()
    {
        return $this->belongsTo('App\Models\Asignatura','id_asignatura');
    }

    public function alumno()
    {
        return $this->belongsTo('App\Models\Alumno','id_alumno');
    }
   









}